<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Teer Khela Results</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .error-container {
            text-align: center;
            color: white;
            max-width: 600px;
        }

        .error-code {
            font-size: 150px;
            font-weight: 700;
            line-height: 1;
            text-shadow: 4px 4px 0 rgba(0,0,0,0.1);
            margin-bottom: 10px;
        }

        .error-icon {
            font-size: 80px;
            margin-bottom: 20px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        h1 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .error-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #ff6b6b;
            color: white;
        }

        .btn-primary:hover {
            background: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.4);
        }

        .btn-secondary {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid rgba(255,255,255,0.4);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 100px;
            }

            .error-icon {
                font-size: 60px;
            }

            h1 {
                font-size: 22px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-bullseye"></i>
        </div>
        <div class="error-code">404</div>
        <h1>Oops! Page Not Found</h1>
        <p>The page you're looking for seems to have missed the target. Let's get you back on track!</p>
        <div class="error-buttons">
            <a href="/" class="btn btn-primary">
                <i class="fas fa-home"></i> Go Home
            </a>
            <a href="/support" class="btn btn-secondary">
                <i class="fas fa-headset"></i> Get Support
            </a>
        </div>
    </div>
</body>
</html>
