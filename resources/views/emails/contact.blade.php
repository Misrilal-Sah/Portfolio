<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>New Contact Form Message</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
      transition: transform 0.3s ease;
    }

    .container:hover {
      transform: translateY(-5px);
    }

    h2 {
      text-align: center;
      color: white;
      font-size: 26px;
      margin-bottom: 30px;
      background-color: #E50914;
      padding:5px;
    }

    .field {
      margin-bottom: 20px;
    }

    .field label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
      color: #34495e;
    }

    .field .value {
      background: #ecf0f1;
      padding: 12px 15px;
      border-radius: 8px;
      font-size: 15px;
    }

    .footer {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      color: #888;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>New Contact Form Message</h2>

    <div class="field">
      <label>Name:</label>
      <div class="value">{{ $data['name'] }}</div>
    </div>

    <div class="field">
      <label>Email:</label>
      <div class="value">{{ $data['email'] }}</div>
    </div>

    <div class="field">
      <label>Subject:</label>
      <div class="value">{{ $data['subject'] }}</div>
    </div>

    <div class="field">
      <label>Message:</label>
      <div class="value">{{ $data['message'] }}</div>
    </div>

    <div class="footer">
      This message was sent from your portfolio contact form.<br>
      Time received: {{ now()->format('Y-m-d H:i:s') }}
    </div>
  </div>

</body>
</html>
