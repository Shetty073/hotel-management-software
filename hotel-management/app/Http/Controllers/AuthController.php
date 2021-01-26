<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getLogin() {
        return view('login.login');
    }


    public function postLogin(Request $request) {
        // authenticate the user and goto dashboard
        return view('login.login');
    }

    public function getLogout() {
        return view('login.login');
    }

}
