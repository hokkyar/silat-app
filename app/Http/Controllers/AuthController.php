<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login_pages(Request $request)
  {
    if ($request->session()->has('user')) {
      if ($request->session()->get('user')->role == 'admin') {
        return redirect()->route('page.admin');
      } else {
        return redirect()->route('page.pengurus');
      }
    }
    return view('login');
  }

  public function login(Request $request)
  {
    $credentials = $request->only('username', 'password');
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      $user = Auth::user();
      $cabor = Cabor::find($user->cabor_id);
      session(['user' => $user, 'cabor' => $cabor]);
      if ($cabor) {
        return redirect()->route('page.pengurus');
      } else {
        return redirect()->route('page.admin');
      }
    }
    return redirect()->route('page.login')->withErrors(['error' => 'Username atau password salah']);
  }

  public function logout(Request $request)
  {
    // Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('page.login');
  }
}
