<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function admin_dashboard(){
    return view('admin.index');
  }

  public function pengurus_dashboard(){
    return view('pengurus.index');
  }
}
