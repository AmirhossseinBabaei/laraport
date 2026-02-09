<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خطای سیستم - حالت توسعه</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vazir-font@30.1.0/dist/font-face.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <style>
        :root {
            --primary: #4361ee;
            --danger: #f72585;
            --warning: #ff9e00;
            --info: #4cc9f0;
            --dark: #212529;
            --light: #f8f9fa;
            --gray: #6c757d;
            --border: #dee2e6;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --radius: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazir', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: var(--dark);
        }

        .error-container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 1200px;
            overflow: hidden;
        }

        .error-header {
            background: linear-gradient(135deg, var(--danger), #ff4d8d);
            color: white;
            padding: 25px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .error-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .error-title i {
            font-size: 32px;
            color: rgba(255, 255, 255, 0.9);
        }

        .error-title h1 {
            font-size: 24px;
            font-weight: 700;
        }

        .error-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
        }

        .error-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            padding: 30px;
        }

        .error-card {
            background: var(--light);
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .error-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border);
        }

        .card-header i {
            font-size: 20px;
            color: var(--primary);
        }

        .card-header h3 {
            font-size: 18px;
            font-weight: 600;
        }

        .error-message-box {
            background: #fff5f5;
            border-right: 4px solid var(--danger);
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message {
            color: var(--danger);
            font-size: 16px;
            line-height: 1.6;
        }

        .error-details {
            margin-top: 15px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: var(--gray);
            width: 150px;
            flex-shrink: 0;
        }

        .detail-value {
            color: var(--dark);
            font-family: monospace;
            padding: 5px 10px;
            background: white;
            border-radius: 5px;
            flex-grow: 1;
            word-break: break-all;
        }

        .code-block {
            background: #1e1e1e;
            color: #d4d4d4;
            border-radius: 5px;
            padding: 20px;
            font-family: 'Consolas', 'Monaco', monospace;
            font-size: 14px;
            line-height: 1.5;
            overflow-x: auto;
            margin-top: 10px;
        }

        .trace-list {
            list-style: none;
            max-height: 300px;
            overflow-y: auto;
        }

        .trace-item {
            background: white;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            border-right: 3px solid var(--info);
        }

        .trace-file {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .trace-line {
            color: var(--danger);
            font-weight: 500;
        }

        .trace-function {
            color: var(--gray);
            font-size: 14px;
        }

        .actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #3a56d4;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--light);
            color: var(--dark);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #e9ecef;
        }

        .environment-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .env-item {
            background: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .env-label {
            font-size: 12px;
            color: var(--gray);
            margin-bottom: 5px;
        }

        .env-value {
            font-weight: 600;
            color: var(--dark);
            font-family: monospace;
        }

        @media (max-width: 768px) {
            .error-content {
                grid-template-columns: 1fr;
            }

            .environment-info {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
<div class="error-container">
    <!-- Header -->
    <div class="error-header">
        <div class="error-title">
            <i class="fas fa-bug"></i>
            <h1>خطای سیستم (حالت توسعه)</h1>
        </div>
        <div class="error-badge">
            <?php echo $error['type']; ?>
        </div>
    </div>

    <!-- Content -->
    <div class="error-content">
        <!-- Left Column -->
        <div>
            <!-- Error Message -->
            <div class="error-card">
                <div class="card-header">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>پیغام خطا</h3>
                </div>
                <div class="error-message-box">
                    <p class="error-message"><?php echo htmlspecialchars($error['message']); ?></p>
                </div>

                <div class="error-details">
                    <div class="detail-row">
                        <span class="detail-label">نوع خطا:</span>
                        <span class="detail-value"><?php echo $error['type']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">کد خطا:</span>
                        <span class="detail-value"><?php echo $error['code']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">فایل:</span>
                        <span class="detail-value"><?php echo $error['file']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">خط:</span>
                        <span class="detail-value"><?php echo $error['line']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">زمان:</span>
                        <span class="detail-value"><?php echo $timestamp; ?></span>
                    </div>
                </div>
            </div>

            <!-- Request Information -->
            <div class="error-card">
                <div class="card-header">
                    <i class="fas fa-globe"></i>
                    <h3>اطلاعات درخواست</h3>
                </div>
                <div class="error-details">
                    <div class="detail-row">
                        <span class="detail-label">متود:</span>
                        <span class="detail-value"><?php echo $request['method']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">آدرس:</span>
                        <span class="detail-value"><?php echo $request['uri']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">IP:</span>
                        <span class="detail-value"><?php echo $request['ip']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">مرجع:</span>
                        <span class="detail-value"><?php echo $request['referer']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <!-- Stack Trace -->
            <div class="error-card">
                <div class="card-header">
                    <i class="fas fa-code-branch"></i>
                    <h3>ردیابی خطا (Stack Trace)</h3>
                </div>
                <div class="trace-list">
                    <?php foreach ($error['trace'] as $index => $trace): ?>
                    <div class="trace-item">
                        <div class="trace-file">
                            #<?php echo $index; ?>:
                            <?php echo $trace['file'] ?? 'internal'; ?>
                        </div>
                        <?php if (isset($trace['line'])): ?>
                        <div class="trace-line">خط: <?php echo $trace['line']; ?></div>
                        <?php endif; ?>
                        <?php if (isset($trace['class'])): ?>
                        <div class="trace-function">
                            <?php echo $trace['class'] . $trace['type'] . $trace['function']; ?>()
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Environment -->
            <div class="error-card">
                <div class="card-header">
                    <i class="fas fa-server"></i>
                    <h3>اطلاعات محیط</h3>
                </div>
                <div class="environment-info">
                    <div class="env-item">
                        <div class="env-label">PHP Version</div>
                        <div class="env-value"><?php echo $environment['php_version']; ?></div>
                    </div>
                    <div class="env-item">
                        <div class="env-label">App Env</div>
                        <div class="env-value"><?php echo $environment['app_env']; ?></div>
                    </div>
                    <div class="env-item">
                        <div class="env-label">Server</div>
                        <div class="env-value">
                            <?php echo substr($environment['server_software'], 0, 20); ?>...
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="actions">
                <button class="btn btn-primary" onclick="window.location.reload()">
                    <i class="fas fa-redo"></i>
                    بارگذاری مجدد
                </button>
                <button class="btn btn-secondary" onclick="window.history.back()">
                    <i class="fas fa-arrow-right"></i>
                    بازگشت
                </button>
                <button class="btn btn-secondary" onclick="copyErrorDetails()">
                    <i class="far fa-copy"></i>
                    کپی اطلاعات
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function copyErrorDetails() {
        const errorDetails = {
            message: '<?php echo addslashes($error['message']); ?>',
            file: '<?php echo addslashes($error['file']); ?>',
            line: '<?php echo $error['line']; ?>',
            type: '<?php echo $error['type']; ?>',
            timestamp: '<?php echo $timestamp; ?>'
        };

        const text = `خطا در برنامه:\n\n` +
            `پیام: ${errorDetails.message}\n` +
            `فایل: ${errorDetails.file}\n` +
            `خط: ${errorDetails.line}\n` +
            `نوع: ${errorDetails.type}\n` +
            `زمان: ${errorDetails.timestamp}`;

        navigator.clipboard.writeText(text).then(() => {
            alert('اطلاعات خطا در کلیپ‌بورد کپی شد.');
        });
    }

    // Highlight code in stack trace
    document.querySelectorAll('.trace-file').forEach(item => {
        item.addEventListener('click', function() {
            this.parentElement.classList.toggle('expanded');
        });
    });
</script>
</body>
</html>