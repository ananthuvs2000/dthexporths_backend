<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function dashboard(){
        return view('admin.home');
    }
    public function check_login()
    {

    }
    public function logout()
    {

    }
  
}
