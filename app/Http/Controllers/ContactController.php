<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     * Handle contact form submission
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMail(Request $request)
    {
        // Initialize debug array
        $debug = [
            'timestamp' => date('Y-m-d H:i:s'),
            'environment' => app()->environment(),
            'steps' => [],
            'mail_config' => $this->getMailConfig(),
            'errors' => []
        ];
    
        try {
            // Step 1: Validation
            $debug['steps'][] = 'Starting form validation';
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|min:10',
                'recaptcha_token' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                $debug['steps'][] = 'Validation failed';
                $debug['errors'][] = $validator->errors()->toArray();
                
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors(),
                    // 'debug' => $debug
                ], 422);
            }
    
            $debug['steps'][] = 'Validation passed';
    
            // Step 2: reCAPTCHA
            $debug['steps'][] = 'Checking reCAPTCHA';
            $recaptchaVerified = true;
            
            if (app()->environment() !== 'local') {
                $debug['steps'][] = 'Verifying reCAPTCHA token';
                $recaptchaVerified = $this->verifyRecaptcha($request->recaptcha_token);
                $debug['recaptcha_verified'] = $recaptchaVerified;
                
                if (!$recaptchaVerified) {
                    $debug['steps'][] = 'reCAPTCHA verification failed';
                    
                    return response()->json([
                        'status' => 'error',
                        'message' => 'reCAPTCHA verification failed. Please try again.',
                        // 'debug' => $debug
                    ], 400);
                }
                
                $debug['steps'][] = 'reCAPTCHA verification passed';
            } else {
                $debug['steps'][] = 'Skipping reCAPTCHA (local environment)';
            }
            
            // Step 3: Log submission
            $debug['steps'][] = 'Logging contact submission';
            $logResult = $this->logContactSubmission($request);
            $debug['log_success'] = $logResult;
    
            // Step 4: Send email
            $debug['steps'][] = 'Attempting to send email';
            
            try {
                $toEmail = env('MAIL_TO_ADDRESS', 'misrilalsah10@gmail.com');
                $debug['to_email'] = $toEmail;
                
                $debug['steps'][] = 'Sending email via Mail::to()->send()';
                Mail::to($toEmail)->send(new ContactFormMail($request->all()));
                $debug['steps'][] = 'Email sent successfully';
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'Your message has been sent successfully! We\'ll get back to you soon.',
                    // 'debug' => $debug
                ]);
            } catch (\Exception $e) {
                // Log mail sending error
                $debug['steps'][] = 'Exception during email sending';
                $debug['mail_error'] = [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ];
                
                Log::error('Mail sending failed: ' . $e->getMessage());
                Log::error($e->getTraceAsString());
                
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to send email: ' . $e->getMessage(),
                    // 'debug' => $debug
                ], 500);
            }
        } catch (\Exception $e) {
            $debug['steps'][] = 'General exception occurred';
            $debug['error'] = [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ];
            
            Log::error('Contact form submission failed: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
                // 'debug' => $debug
            ], 500);
        }
    }
    
    /**
     * Get mail configuration for debugging
     * 
     * @return array
     */
    private function getMailConfig()
    {
        return [
            'driver' => config('mail.default'),
            'host' => config('mail.mailers.' . config('mail.default') . '.host', 'Not set'),
            'port' => config('mail.mailers.' . config('mail.default') . '.port', 'Not set'),
            'from_address' => config('mail.from.address', 'Not set'),
            'encryption' => config('mail.mailers.' . config('mail.default') . '.encryption', 'Not set'),
            'username' => config('mail.mailers.' . config('mail.default') . '.username', 'Not set'),
            'has_password' => !empty(config('mail.mailers.' . config('mail.default') . '.password')),
            'to_address' => env('MAIL_TO_ADDRESS', 'misrilalsah10@gmail.com')
        ];
    }

    /**
     * Verify reCAPTCHA token with Google
     *
     * @param string $token
     * @return bool
     */
    private function verifyRecaptcha($token)
    {
        try {
            Log::info('Verifying reCAPTCHA token...');
            
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => env('RECAPTCHA_SECRET_KEY', '6Lc73xsrAAAAAISVG1PKra_Tm1WSe08KZPP09WI7'),
                    'response' => $token,
                    'remoteip' => request()->ip()
                ]
            ]);
            
            $body = json_decode($response->getBody(), true);
            Log::info('reCAPTCHA response:', $body ?? []);
            
            return $body['success'] ?? false;
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification failed: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return false;
        }
    }

    /**
     * Log contact form submission to a file
     *
     * @param Request $request
     * @return bool
     */
    private function logContactSubmission(Request $request)
    {
        try {
            $timestamp = date('Y-m-d H:i:s');
            $logData = [
                'timestamp' => $timestamp,
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip' => $request->ip(),
                'user_agent' => $request->header('User-Agent')
            ];
            
            $logContent = json_encode($logData, JSON_PRETTY_PRINT) . "\n--------------------------\n";
            $logPath = storage_path('logs/contact_submissions.json');
            file_put_contents($logPath, $logContent, FILE_APPEND);
            
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to log contact submission: ' . $e->getMessage());
            return false;
        }
    }
} 