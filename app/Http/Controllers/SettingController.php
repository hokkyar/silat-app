<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
  public function index()
  {
    if (auth()->user()->role == 'admin') {
      return view('admin.setting');
    } else {
      return view('pengurus.setting');
    }
    abort(404);
  }

  public function updatePassword(Request $request)
  {
    $user = User::find(auth()->user()->id);
    $request->validate([
      'old_password' => [
        'required',
        function ($attribute, $value, $fail) {
          if (!Hash::check($value, auth()->user()->password)) {
            $fail('Password lama tidak cocok!');
          }
        },
      ],
      'new_password' => 'required|min:8'
    ], [
      'new_password.min' => 'Password minimal 8 karakter!'
    ]);
    $user->password = Hash::make($request->new_password);
    $user->save();
    if ($user->role == 'admin') {
      return redirect('/admin')->with('success', 'Password berhasil diubah');
    } else {
      return redirect('/pengurus')->with('success', 'Password berhasil diubah');
    }
  }
}
