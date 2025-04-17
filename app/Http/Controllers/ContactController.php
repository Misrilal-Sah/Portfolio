<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'recaptcha_token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Skip reCAPTCHA verification in local environment
        $recaptchaVerified = true;
        
        // Only verify reCAPTCHA in non-local environments
        if (app()->environment() !== 'local') {
            $recaptchaVerified = $this->verifyRecaptcha($request->recaptcha_token);
            
            if (!$recaptchaVerified) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'reCAPTCHA verification failed. Please try again.'
                ], 400);
            }
        }
        
        // Always log the form submission
        $this->logContactSubmission($request);

        // Try to send the email
        try {
            $toEmail = env('MAIL_TO_ADDRESS', 'newtestaccount91231236test@mailinator.com');
            
            Mail::to($toEmail)->send(new ContactFormMail($request->all()));

            // Check if email was sent
            $failures = Mail::failures();
            if (count($failures) > 0) {
                // Mail failed, but we have logged it
                return response()->json([
                    'status' => 'success',
                    'message' => 'Your message has been received and logged. We\'ll get back to you soon!'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Your message has been sent successfully! We\'ll get back to you soon.'
            ]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Mail sending failed: ' . $e->getMessage());
            
            // Since we've already logged the submission, return success
            return response()->json([
                'status' => 'success',
                'message' => 'Your message has been received! Our team will contact you shortly.'
            ]);
        }
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
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                // Using reCAPTCHA v2 Checkbox secret key
                'secret' => '6Lc73xsrAAAAAISVG1PKra_Tm1WSe08KZPP09WI7',
                'response' => $token,
                'remoteip' => request()->ip()
            ]);
            
            $body = $response->json();
            
            // For v2 Checkbox, we only care about success, not score
            return $body['success'] ?? false;
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification failed: ' . $e->getMessage());
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