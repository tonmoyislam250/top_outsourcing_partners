<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New {{ $blog->formatted_type }}: {{ $blog->title }}</title>
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
            background-color: #f8fafc;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 40px;
            text-align: center;
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
            padding: 40px;
        }

        .post-preview {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .post-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        .post-content {
            padding: 25px;
        }

        .post-badge {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
        }

        .post-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .post-excerpt {
            color: #64748b;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            color: #64748b;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .footer {
            background-color: #f8fafc;
            padding: 30px 40px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .footer p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #64748b;
            font-size: 18px;
            text-decoration: none;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 30px 0;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 0;
                box-shadow: none;
            }

            .header,
            .content,
            .footer {
                padding: 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .post-title {
                font-size: 20px;
            }

            .post-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .cta-button {
                display: block;
                text-align: center;
                width: 100%;
                padding: 18px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>📚 New Content Alert!</h1>
            <p>We've just published something you might love</p>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="post-preview">
                @if($blog->image)
                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="post-image">
                @else
                    <div class="post-image" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-size: 48px;">
                        📝
                    </div>
                @endif
                
                <div class="post-content">
                    <span class="post-badge">{{ $blog->formatted_type }}</span>
                    
                    <h2 class="post-title">{{ $blog->title }}</h2>
                    
                    <div class="post-excerpt">
                        {{ Str::limit(strip_tags($blog->content), 150) }}
                    </div>
                    
                    <div class="post-meta">
                        <div class="meta-item">
                            👤 {{ $blog->user->name }}
                        </div>
                        <div class="meta-item">
                            📅 {{ $blog->created_at->format('M d, Y') }}
                        </div>
                        <div class="meta-item">
                            ⏱️ {{ ceil(str_word_count($blog->content) / 200) }} min read
                        </div>
                    </div>
                    
                    <a href="{{ $postUrl }}" class="cta-button">
                        Read Full {{ $blog->formatted_type }} →
                    </a>
                </div>
            </div>

            <div class="divider"></div>

            <p style="color: #64748b; font-size: 16px; text-align: center; margin-bottom: 20px;">
                Thank you for being a valued subscriber! We hope you enjoy this new content.
            </p>

            @if($blog->keywords && count($blog->keywords) > 0)
            <div style="text-align: center; margin-bottom: 20px;">
                <p style="color: #64748b; font-size: 14px; margin-bottom: 10px;">🏷️ Topics covered:</p>
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;">
                    @foreach($blog->keywords as $keyword)
                    <span style="background: #f1f5f9; color: #667eea; padding: 4px 8px; border-radius: 12px; font-size: 12px; font-weight: 500;">
                        {{ $keyword }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>
                You're receiving this email because you subscribed to our newsletter.
            </p>
            <p>
                <a href="{{ str_replace('{email}', '__EMAIL__', $unsubscribeUrl) }}">Unsubscribe</a> |
                <a href="{{ route('blogs.index') }}">View All Posts</a> |
                <a href="{{ route('contact') }}">Contact Us</a>
            </p>
            
            <div class="social-links">
                <a href="#" title="Twitter">🐦</a>
                <a href="#" title="LinkedIn">💼</a>
                <a href="#" title="Facebook">📘</a>
            </div>
            
            <div class="divider"></div>
            
            <p style="font-size: 12px; color: #94a3b8;">
                © {{ date('Y') }} Top Outsourcing Partners. All rights reserved.<br>
                Professional outsourcing solutions for your business needs.
            </p>
        </div>
    </div>
</body>
</html>
