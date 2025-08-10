<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Newsletter!</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        
        .header h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .header .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        .welcome-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            display: block;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 1.4rem;
            color: #2d3748;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .message {
            font-size: 1.1rem;
            color: #4a5568;
            margin-bottom: 30px;
            text-align: center;
            line-height: 1.8;
        }
        
        .benefits {
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
        }
        
        .benefits h3 {
            color: #2d3748;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.3rem;
        }
        
        .benefit-list {
            list-style: none;
        }
        
        .benefit-list li {
            padding: 10px 0;
            display: flex;
            align-items: center;
            font-size: 1rem;
            color: #4a5568;
        }
        
        .benefit-list li::before {
            content: "✅";
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        .cta-section {
            text-align: center;
            margin: 30px 0;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
            text-decoration: none;
            color: white;
        }
        
        .social-section {
            background: #f7fafc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }
        
        .social-title {
            color: #2d3748;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .social-link {
            display: inline-block;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .footer {
            background: #2d3748;
            color: #cbd5e0;
            padding: 30px;
            text-align: center;
            font-size: 0.9rem;
        }
        
        .footer a {
            color: #3b82f6;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        .unsubscribe-link {
            color: #a0aec0;
            font-size: 0.85rem;
            margin-top: 15px;
            display: block;
        }
        
        /* Responsive Design */
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .benefits {
                padding: 20px;
            }
            
            .social-section {
                padding: 20px;
            }
            
            .footer {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="welcome-icon">🎉</div>
            <h1>Welcome Aboard!</h1>
            <p class="subtitle">You're now part of our exclusive community</p>
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <h2 class="greeting">Hello there! 👋</h2>
            
            <p class="message">
                Thank you for subscribing to the <strong>Top Outsourcing Partners</strong> newsletter! 
                We're thrilled to have you join our community of business leaders, entrepreneurs, 
                and professionals who are passionate about growth and innovation.
            </p>
            
            <!-- Benefits Section -->
            <div class="benefits">
                <h3>🚀 Here's what you can expect:</h3>
                <ul class="benefit-list">
                    <li>Latest insights on outsourcing trends and best practices</li>
                    <li>Expert case studies from successful partnerships</li>
                    <li>Industry analysis and market updates</li>
                    <li>Practical tips for business growth and efficiency</li>
                    <li>Exclusive resources and downloadable guides</li>
                    <li>First access to our new services and offerings</li>
                </ul>
            </div>
            
            <p class="message">
                We promise to deliver valuable content straight to your inbox, 
                helping you stay ahead in the competitive business landscape.
            </p>
            
            <!-- Call to Action -->
            <div class="cta-section">
                <a href="{{ route('blogs.index') }}" class="cta-button">
                    📚 Explore Our Latest Content
                </a>
            </div>
        </div>
        
        <!-- Social Media Section -->
        <div class="social-section">
            <h3 class="social-title">🌟 Connect With Us</h3>
            <div class="social-links">
                <a href="#" class="social-link" title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="social-link" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-link" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-link" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <p style="margin: 0; color: #4a5568;">Follow us for daily insights and updates!</p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>
                <strong>Top Outsourcing Partners</strong><br>
                Your trusted partner for business growth and success
            </p>
            
            <p style="margin-top: 15px;">
                <a href="{{ route('blogs.index') }}">Visit Our Blog</a> |
                <a href="{{ route('contact') }}">Contact Us</a> |
                <a href="{{ route('about') }}">About Us</a>
            </p>
            
            <a href="{{ $unsubscribeUrl }}" class="unsubscribe-link">
                Don't want to receive these emails? Unsubscribe here
            </a>
        </div>
    </div>
</body>
</html>
