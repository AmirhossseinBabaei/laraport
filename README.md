<p align="center"> <img src="[url=https://uploadkon.ir/do.php?imgf=b58502_26b56b0d3c-8d0b-46ca-80bd-422b2058ec07.png][img]https://uploadkon.ir/do.php?thmbf=b58502_26b56b0d3c-8d0b-46ca-80bd-422b2058ec07.png[/img][/url]" width="200" alt="Laraport Logo"> </p><p align="center"> <a href="https://packagist.org/packages/laraport/framework"><img src="https://img.shields.io/packagist/v/laraport/framework" alt="Latest Version"></a> <a href="https://github.com/laraport/framework/actions"><img src="https://img.shields.io/github/actions/workflow/status/laraport/framework/tests.yml" alt="Tests"></a> <a href="https://packagist.org/packages/laraport/framework"><img src="https://img.shields.io/packagist/dt/laraport/framework" alt="Total Downloads"></a> <a href="https://github.com/laraport/framework/blob/main/LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a> </p>
<h1>Laraport Framework</h1>
🚀 Introduction
Laraport is a simple, fast, and modern PHP framework built for developers who value simplicity and control. Inspired by Laravel's elegance but designed to be more lightweight and approachable.

<h3>📦 Installation</h3>
bash composer create-project laraport/framework project-name 🛠️ Features ✅ Currently Supported HTTP Routing &
Middleware

MVC Architecture (Controllers, Views)

Blade-style Templating Engine

Simple Database Query Builder

Configuration Management (.env support)

Basic CLI Commands (Artisan-style)

Dependency Injection Container

<h3>🔄 In Development</h3>

Eloquent-inspired ORM (Lightweight)

Authentication System

Form Validation

Session Management

Persian Date & Currency Support

📖 Quick Start

1. Create a Route php // routes/web.php

$router = new \Core\Router\Router();
$router->addRoute('get', '/', [\App\Http\Controllers\HomeController::class, 'index']); $router->addRoute('get', '

2. Create a Controller php 
3. // app/Controllers/UserController.php

class UserController { public function show($id)
{ $user = User::find($id); return view('users.show', compact('user')); } }

<!-- resources/views/welcome.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Laraport</title>
</head>
<body>
    <h1>Hello, {{ $name }}!</h1>
</body>
</html>
🔧 Database Usage
php
// Query Builder
$users = DB::table('users')
    ->where('active', 1)
    ->orderBy('created_at', 'desc')
    ->get();
🎯 Requirements
PHP 8.0 or higher

Composer

<h3>PDO PHP Extension</h3>

📄 License The Laraport framework is open-sourced software licensed under the MIT license.

🤝 Contributing Thank you for considering contributing to Laraport! Please read our contributing guide before submitting
a pull request.

🐛 Security Vulnerabilities If you discover a security vulnerability within Laraport, please send an e-mail to
security@laraport.dev.

<h3>❤️ Support Documentation</h3>

Discord Community

GitHub Issues

<p align="center"> Built with ❤️ by the Laraport Community </p>