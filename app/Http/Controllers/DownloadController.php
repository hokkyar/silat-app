<?php

namespace App\Http\Controllers;

use App\Models\Cabor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadController extends Controller
{
  public function download(Request $request, String $id)
  {
    if (strtolower($request->query('d')) === 'struktur') {
      $data = Cabor::with('struktur')->where('id', $id)->first();
      $title = 'Struktur Organisasi';
      $pdf = Pdf::loadView('download.struktur', compact('data', 'title'));
      return $pdf->download('Struktur Organisasi ' . $data->nama_cabor . '.pdf');
    }
    if (strtolower($request->query('d')) === 'anggota') {
      $data = Cabor::with('anggota')->where('id', $id)->first();
      $title = 'Data Pelatih dan Atlet';
      $pdf = Pdf::loadView('download.anggota', compact('data', 'title'));
      return $pdf->download('Data Pelatih dan Atlet ' . $data->nama_cabor . '.pdf');
    }
    if (strtolower($request->query('d')) === 'program') {
      $data = Cabor::with('program')->where('id', $id)->first();
      $title = 'Data Program';
      $pdf = Pdf::loadView('download.program', compact('data', 'title'));
      return $pdf->download('Data Program ' . $data->nama_cabor . '.pdf');
    }
    if (strtolower($request->query('d')) === 'prestasi') {
      $data = Cabor::with('prestasi')->where('id', $id)->first();
      $title = 'Data Prestasi';
      $pdf = Pdf::loadView('download.prestasi', compact('data', 'title'));
      return $pdf->download('Data Prestasi ' . $data->nama_cabor . '.pdf');
    }
    if (strtolower($request->query('d')) === 'inventaris') {
      $data = Cabor::with('inventaris')->where('id', $id)->first();
      $title = 'Data Inventaris';
      $pdf = Pdf::loadView('download.inventaris', compact('data', 'title'));
      return $pdf->download('Data Inventaris ' . $data->nama_cabor . '.pdf');
    }
    abort(404);
  }
}
