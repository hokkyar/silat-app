<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function admin_dashboard()
  {
    return view('admin.index');
  }

  public function pengurus_dashboard()
  {
    $cabor_desc = Cabor::find(session('cabor')->id)->desc;
    return view('pengurus.index', compact('cabor_desc'));
  }

  public function edit_desc(Request $request)
  {
    Cabor::where('id', session('cabor')->id)->update([
      'desc' => $request->desc,
    ]);
    return redirect('/pengurus')->with('toast_success', 'Data berhasil diupdate');
  }
}
