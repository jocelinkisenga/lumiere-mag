<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $subjectLine }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            margin: 0;
            padding: 20px 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .email-wrapper {
            max-width: 650px;
            margin: 0 auto;
        }

        .container {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 0 1px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 50%, #1e3a8a 100%);
            color: #ffffff;
            padding: 50px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .header-subtitle {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Content Section */
        .content {
            padding: 45px 40px;
            color: #2c3e50;
            font-size: 15px;
            line-height: 1.8;
        }

        .content p {
            margin-bottom: 20px;
            color: #34495e;
        }

        .content p:last-child {
            margin-bottom: 0;
        }

        /* Image Responsive Styles */
        .content img {
            max-width: 100% !important;
            height: auto !important;
            display: block;
            margin: 25px 0;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Headings in content */
        .content h1,
        .content h2,
        .content h3,
        .content h4,
        .content h5,
        .content h6 {
            color: #1e40af;
            font-weight: 700;
            margin: 30px 0 15px 0;
            line-height: 1.3;
        }

        .content h1 { font-size: 28px; }
        .content h2 { font-size: 24px; }
        .content h3 { font-size: 20px; }
        .content h4 { font-size: 18px; }

        /* Lists styling */
        .content ul,
        .content ol {
            margin: 20px 0 20px 25px;
            color: #34495e;
        }

        .content li {
            margin-bottom: 10px;
            line-height: 1.8;
        }

        /* Bold & Italic */
        .content strong {
            color: #1e40af;
            font-weight: 700;
        }

        .content em {
            color: #2c3e50;
            font-style: italic;
        }

        /* Blockquote */
        .content blockquote {
            border-left: 4px solid #2563eb;
            padding: 20px 0 20px 20px;
            margin: 25px 0;
            color: #555;
            font-style: italic;
            background-color: #f8f9fa;
            border-radius: 4px;
        }

        /* Links */
        .content a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .content a:hover {
            color: #1e40af;
            text-decoration: underline;
        }

        /* CTA Button */
        .cta-wrapper {
            margin-top: 35px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #ffffff;
            padding: 14px 36px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            letter-spacing: 0.3px;
        }

        .btn:hover {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e0e0e0, transparent);
            margin: 30px 0;
        }

        /* Footer Section */
        .footer {
            background: linear-gradient(to bottom, #f8f9fa, #f1f3f5);
            padding: 30px 40px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .footer-content {
            font-size: 13px;
            color: #666;
            line-height: 1.8;
        }

        .footer-brand {
            color: #1e40af;
            font-weight: 700;
            font-size: 14px;
        }

        .footer-divider {
            margin: 15px 0;
            font-size: 12px;
            color: #bbb;
        }

        .social-links {
            margin-top: 15px;
        }

        .social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 50%;
            line-height: 36px;
            text-align: center;
            margin: 0 6px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #1e40af;
            transform: scale(1.1);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                border-radius: 12px;
            }

            .header {
                padding: 35px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .content {
                padding: 30px 20px;
                font-size: 14px;
            }

            .footer {
                padding: 25px 20px;
                font-size: 12px;
            }

            .content img {
                margin: 20px 0;
                border-radius: 8px;
            }

            .btn {
                padding: 12px 28px;
                font-size: 14px;
            }

            .email-wrapper {
                margin: 0 10px;
            }
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
            }

            .container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="container">
            <!-- Header -->
            <div class="header">
                <div class="header-content">
                    <div class="header-subtitle">✨ Nouvelle Publication</div>
                    <h1>{{ $subjectLine }}</h1>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                {!! $content !!}

                <!-- CTA Button -->
                <div class="cta-wrapper">
                    <a href="{{ url('/') }}" class="btn">📖 Découvrir Notre Blog</a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-content">
                    <div>
                        <span class="footer-brand">© {{ date('Y') }} {{ config('app.name', 'Lumière du Monde Magazine') }}</span>
                    </div>
                    <div class="footer-divider">—</div>
                    <div>
                        Vous recevez cet email car vous êtes abonné à notre Newsletter.
                    </div>
                    <div style="margin-top: 12px; font-size: 12px; color: #999;">
                        💌 <a href="{{ url('/') }}" style="color: #999; text-decoration: none;">Gérer vos préférences</a> | 
                        <a href="{{ url('/') }}" style="color: #999; text-decoration: none;">Se désabonner</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spacer -->
        <div style="height: 20px;"></div>
    </div>
</body>
</html>
