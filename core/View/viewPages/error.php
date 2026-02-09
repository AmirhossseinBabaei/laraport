<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exception - laraport Framework</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/atom-one-dark.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        .exception-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1400px;
            margin: 0 auto;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header */
        .exception-header {
            background: linear-gradient(to right, #E3342F, #F56565);
            color: white;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .framework-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .framework-title i {
            font-size: 28px;
            background: rgba(255, 255, 255, 0.2);
            padding: 12px;
            border-radius: 10px;
        }

        .framework-title h1 {
            font-size: 24px;
            font-weight: 700;
        }

        .error-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        /* Main Error Info */
        .error-main {
            padding: 30px;
            border-bottom: 1px solid #E2E8F0;
            background: #FEF2F2;
        }

        .error-class {
            font-size: 22px;
            font-weight: 700;
            color: #C53030;
            margin-bottom: 10px;
        }

        .error-message {
            font-size: 18px;
            color: #742A2A;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .error-location {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #718096;
            font-size: 15px;
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
        }

        .error-location i {
            color: #E3342F;
        }

        /* Code Snippet */
        .code-snippet {
            margin: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .code-header {
            background: #2D2D2D;
            color: #E2E8F0;
            padding: 15px 20px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .copy-btn {
            background: #4A5568;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: background 0.2s;
        }

        .copy-btn:hover {
            background: #2D3748;
        }

        pre {
            margin: 0;
            padding: 0;
            background: #2D2D2D;
            overflow-x: auto;
        }

        code {
            font-family: 'Fira Code', 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.6;
        }

        .line-number {
            color: #718096;
            text-align: right;
            padding-right: 15px;
            user-select: none;
        }

        .line-error {
            background: rgba(229, 62, 62, 0.1);
            border-left: 4px solid #E3342F;
        }

        /* Stack Trace */
        .stack-trace {
            margin: 30px;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            overflow: hidden;
        }

        .trace-header {
            background: #EDF2F7;
            padding: 18px 25px;
            font-weight: 700;
            color: #2D3748;
            border-bottom: 1px solid #E2E8F0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .trace-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .trace-item {
            padding: 20px 25px;
            border-bottom: 1px solid #E2E8F0;
            transition: background 0.2s;
            cursor: pointer;
        }

        .trace-item:hover {
            background: #F7FAFC;
        }

        .trace-item:last-child {
            border-bottom: none;
        }

        .trace-file {
            color: #2D3748;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .trace-line {
            color: #718096;
            font-size: 14px;
            margin-left: 28px;
        }

        .trace-function {
            color: #4A5568;
            font-family: 'Fira Code', monospace;
            font-size: 14px;
            margin-left: 28px;
        }

        /* Environment */
        .environment-section {
            margin: 30px;
        }

        .env-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .env-card {
            background: white;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .env-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .env-title {
            color: #4A5568;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .env-content {
            font-family: 'Fira Code', monospace;
            font-size: 13px;
            color: #2D3748;
            background: #F7FAFC;
            padding: 12px;
            border-radius: 6px;
            overflow-x: auto;
            white-space: pre-wrap;
        }

        /* Footer */
        .exception-footer {
            background: #EDF2F7;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #E2E8F0;
            color: #718096;
            font-size: 14px;
        }

        .footer-info {
            display: flex;
            gap: 30px;
        }

        .footer-actions {
            display: flex;
            gap: 15px;
        }

        .action-btn {
            background: white;
            border: 1px solid #CBD5E0;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn:hover {
            background: #F7FAFC;
            border-color: #A0AEC0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .exception-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .env-grid {
                grid-template-columns: 1fr;
            }

            .exception-footer {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .footer-info {
                flex-direction: column;
                gap: 10px;
            }

            .code-snippet, .stack-trace, .environment-section {
                margin: 20px 15px;
            }
        }
    </style>
</head>
<body>
<div class="exception-container">
    <!-- Header -->
    <div class="exception-header">
        <div class="framework-title">
            <i class="fas fa-fire"></i>
            <h1>laraport Framework</h1>
        </div>
        <div class="error-badge">
            <i class="fas fa-exclamation-circle"></i>
            Exception
        </div>
    </div>

    <!-- Main Error -->
    <div class="error-main">
        <div class="error-class">
            ErrorException
        </div>
        <div class="error-message">
            <?php echo $title ?? '' ?>
        </div>
        <div class="error-location">
            <i class="fas fa-file-code"></i>
            <span><?php echo $description ?? ''; ?></span>
<!--            <span>/var/www/laraport/app/Controllers/UserController.php:45</span>-->
        </div>
    </div>

    <!-- Stack Trace -->
    <div class="stack-trace">
        <div class="trace-header">
            <i class="fas fa-layer-group"></i>
            Stack Trace
        </div>
<!--        <div class="trace-list">-->
<!--            <div class="trace-item">-->
<!--                <div class="trace-file">-->
<!--                    <i class="far fa-file-code"></i>-->
<!--                    /app/Controllers/UserController.php-->
<!--                </div>-->
<!--                <div class="trace-line">Line 45 → show()</div>-->
<!--                <div class="trace-function">show(123)</div>-->
<!--            </div>-->
<!--            <div class="trace-item">-->
<!--                <div class="trace-file">-->
<!--                    <i class="far fa-file-code"></i>-->
<!--                    /app/Routing/Router.php-->
<!--                </div>-->
<!--                <div class="trace-line">Line 128 → dispatch()</div>-->
<!--                <div class="trace-function">dispatch('GET', '/users/123')</div>-->
<!--            </div>-->
<!--            <div class="trace-item">-->
<!--                <div class="trace-file">-->
<!--                    <i class="far fa-file-code"></i>-->
<!--                    /public/index.php-->
<!--                </div>-->
<!--                <div class="trace-line">Line 32 → handle()</div>-->
<!--                <div class="trace-function">handle(Request $request)</div>-->
<!--            </div>-->
<!--            <div class="trace-item">-->
<!--                <div class="trace-file">-->
<!--                    <i class="far fa-file-code"></i>-->
<!--                    [internal function]-->
<!--                </div>-->
<!--                <div class="trace-function">Composer\Autoload\ClassLoader->loadClass()</div>-->
<!--            </div>-->
<!--        </div>-->
    </div>

    <!-- Environment -->
    <div class="environment-section">
        <div class="trace-header">
            <i class="fas fa-server"></i>
            Environment
        </div>
        <div class="env-grid">
            <div class="env-card">
                <div class="env-title">
                    <i class="fas fa-code"></i>
                    Request
                </div>
                <div class="env-content">
                    GET /users/123
                    Headers:
                    - Host: localhost:8000
                    - User-Agent: Mozilla/5.0
                    - Accept: application/json
                </div>
            </div>
            <div class="env-card">
                <div class="env-title">
                    <i class="fas fa-database"></i>
                    Context
                </div>
                <div class="env-content">
                    $id = 123
                    $users = [User, User, User]
                    $profile = Profile {#456}
                    $_SESSION = ['auth' => true]
                </div>
            </div>
            <div class="env-card">
                <div class="env-title">
                    <i class="fas fa-info-circle"></i>
                    System
                </div>
                <div class="env-content">
                    PHP: 8.2.10
                    laraport: 1.0.0
                    OS: Linux
                    Time: <?php echo date('Y-m-d H:i:s'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="exception-footer">
        <div class="footer-info">
            <span><i class="far fa-clock"></i> <?php echo date('H:i:s'); ?></span>
            <span><i class="fas fa-microchip"></i> Peak Memory: 16.5 MB</span>
            <span><i class="fas fa-bolt"></i> Execution Time: 45ms</span>
        </div>
        <div class="footer-actions">
            <button class="action-btn" onclick="window.location.reload()">
                <i class="fas fa-redo"></i> Reload
            </button>
            <button class="action-btn" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i> Go Back
            </button>
            <button class="action-btn" onclick="window.location.href='/'">
                <i class="fas fa-home"></i> Home
            </button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script>
    // Syntax highlighting
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('code.language-php').forEach((block) => {
            hljs.highlightElement(block);
        });
    });

    // Copy code functionality
    function copyCode() {
        const code = document.querySelector('code.language-php').innerText;
        navigator.clipboard.writeText(code).then(() => {
            const btn = document.querySelector('.copy-btn');
            const original = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            btn.style.background = '#38A169';
            setTimeout(() => {
                btn.innerHTML = original;
                btn.style.background = '';
            }, 2000);
        });
    }

    // Expand/collapse trace items
    document.querySelectorAll('.trace-item').forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('expanded');
        });
    });

    // Auto-scroll to error line
    window.addEventListener('load', () => {
        const errorLine = document.querySelector('.line-error');
        if (errorLine) {
            errorLine.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>
</body>
</html>