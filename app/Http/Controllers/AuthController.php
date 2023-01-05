<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register () {
        return view ('guest.register');
    }
    public function login () {
        return view ('guest.login');
    }
}
