<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>خوش آمدید - Laraport Framework</title>
    <style>
        body {
            font-family: Vazirmatn, Tahoma;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        h1 {
            color: #667eea;
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .logo {
            color: #667eea;
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .version {
            background: #667eea;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .message {
            font-size: 1.2rem;
            line-height: 1.8;
            margin: 30px 0;
            color: #555;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 40px 0;
            text-align: right;
        }

        .feature {
            background: #f8f9ff;
            padding: 20px;
            border-radius: 10px;
            border-right: 4px solid #667eea;
        }

        .feature h3 {
            color: #667eea;
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            margin: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: #5a67d8;
            transform: translateY(-3px);
        }

        .footer {
            margin-top: 40px;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@vazirmatn/matn@latest/Vazirmatn-font-face.css">
</head>
<body>
<div class="container">
    <div class="logo">⚡</div>
    <h1>Laraport Framework</h1>
    <div class="version">Versio ۱.۰.۰</div>

    <div class="message">
        welcome to laraport fremework<br>
        laraport is an php fremework for develop your applications
    </div>

    <div class="features">
        <div class="feature">
            <h3>good speed</h3>
            <p>Good performance and very very good</p>
        </div>
        <div class="feature">
            <h3>best security</h3>
            <p>good security and performance</p>
        </div>
        <div class="feature">
            <h3>beautiful syntax</h3>
            <p>enjoy your develops with Laraport</p>
        </div>
        <div class="feature">
            <h3>madular</h3>
            <p>clean archivity and fast speed</p>
        </div>
    </div>

    <div>
        <a href="/docs" class="btn">📚 docs</a>
        <a href="/demo" class="btn">🛠️ demo</a>
        <a href="https://github.com" class="btn">🐙 github</a>
    </div>

    <div class="footer">
        ساخته شده با ❤️ برای جامعه PHP |
        <a href="https://github.com/amirhossseinbabaei" style="color:#667eea">@amirhossseinbabaei</a>
    </div>
</div>
</body>
</html>