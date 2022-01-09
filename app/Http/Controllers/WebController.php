<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function loginAction(){
        return view('login');
    }

    public function userListAction(){
        return view('userlist');
    }

    public function addUserAction(){
        return view('adduser');
    }
}
