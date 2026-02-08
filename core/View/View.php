<?php
// core/View/View.php

namespace Core\View;

class View
{
    /**
     * نمایش ویو
     *
     * @param string $view نام ویو (مثال: 'home' یا 'users.profile')
     * @param array $data داده‌های مورد نیاز ویو
     */
    public static function show(string $view, array $data = []): void
    {
        // تبدیل نام ویو به مسیر فایل
        // 'users.profile' -> 'users/profile.php'
        $viewPath = self::getViewPath($view);

        // بررسی وجود فایل
        if (!file_exists($viewPath)) {
            die("❌ فایل ویو پیدا نشد: <strong>$viewPath</strong>");
        }

        // استخراج داده‌ها به متغیر
        extract($data, EXTR_SKIP);

        // اجرای فایل ویو
        require $viewPath;
    }

    /**
     * گرفتن مسیر کامل فایل ویو
     */
    private static function getViewPath(string $view): string
    {
        // تبدیل نقطه به اسلش
        $view = str_replace('.', '/', $view);

        // مسیر اصلی ویوها
        $basePath = __DIR__ . '/../../resources/views/';

        // اضافه کردن پسوند .php
        return $basePath . $view . '.php';
    }

    /**
     * رندر ویو و برگرداندن به عنوان رشته
     */
    public static function render(string $view, array $data = []): string
    {
        ob_start();
        self::show($view, $data);
        return ob_get_clean();
    }

    /**
     * Escape کردن متن برای جلوگیری از XSS
     */
    public static function e($value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}