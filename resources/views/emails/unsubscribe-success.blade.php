<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Unsubscribe - Top Outsourcing Partners</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 500px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 36px;
        }

        .message {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .email {
            background: #f7fafc;
            color: #667eea;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
        }

        .footer {
            padding: 20px 30px;
            background: #f8fafc;
            color: #64748b;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px;
                max-width: none;
            }

            .header,
            .content {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .message {
                font-size: 16px;
            }

            .btn {
                padding: 12px 24px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Newsletter Unsubscribe</h1>
            <p>We're sorry to see you go</p>
        </div>

        <div class="content">
            <div class="icon">
                ✓
            </div>

            <div class="message">
                {{ $message }}
            </div>

            @if($email)
            <div class="email">
                {{ $email }}
            </div>
            @endif

            <div class="buttons">
                <a href="{{ route('blogs.index') }}" class="btn btn-primary">
                    Browse Our Content
                </a>
                
                <a href="{{ route('newsletter.subscribe') }}" class="btn btn-secondary">
                    Resubscribe
                </a>
            </div>
        </div>

        <div class="footer">
            <p>
                You can always resubscribe at any time from our website.<br>
                Thank you for your interest in Top Outsourcing Partners.
            </p>
        </div>
    </div>
</body>
</html>
