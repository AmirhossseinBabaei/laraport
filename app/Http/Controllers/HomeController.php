<?php

namespace App\Http\Controllers;

use App\Models\User;
use Core\View\View;

class HomeController extends Controller
{
    public function index()
    {
        return View::render('welcome', ['title' => 'laraport']);
    }
}