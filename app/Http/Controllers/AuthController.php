<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login_pages()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    dd('proses login disini');
  }

  public function logout()
  {
    dd('proses logout');
  }
}
