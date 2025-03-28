<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #555;
        }
        p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Phone:</strong> {{ $data['phone'] ?? 'N/A' }}</p>
        <p><strong>Fax:</strong> {{ $data['fax'] ?? 'N/A' }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $data['message'] }}</p>
        <div class="footer">
            <p>This email was sent from the contact form on your website.</p>
        </div>
    </div>
</body>
</html>
