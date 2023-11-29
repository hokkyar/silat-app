@extends('layouts.admin')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="text-primary">Data Inventaris Cabor {{ Str::title($data->nama_cabor) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/admin">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Inventaris</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Jenis Barang</th>
                                                <th>Jenis Aset</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($data->inventaris as $inventaris)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $inventaris->tanggal }}</td>
                                                    <td>{{ Str::title($inventaris->jenis_barang) }}</td>
                                                    <td>
                                                        @if ($inventaris->jenis_aset == 'habis_pakai')
                                                            <div class="badge badge-primary">
                                                                Habis Pakai
                                                            </div>
                                                        @endif
                                                        @if ($inventaris->jenis_aset == 'tidak_habis_pakai')
                                                            <div class="badge badge-light">
                                                                Tidak Habis Pakai
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button onclick="viewData({{ json_encode($inventaris) }})"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            class="btn btn-primary btn-sm w-25"><i
                                                                class="fa fa-info-circle"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Inventaris</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewData(data) {
            $('.modal-body').empty();
            $('.modal-body').append(`
              <table style="font-size: 18px;">
                  <tr>
                      <td>Jenis Barang</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.jenis_barang}</td>
                  </tr>
                  <tr>
                      <td>Harga Satuan</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.harga_satuan}</td>
                  </tr>
                  <tr>
                      <td>Tanggal</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.tanggal}</td>
                  </tr>
                  <tr>
                      <td>Jumlah</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.jumlah}</td>
                  </tr>
                  <tr>
                      <td>Kondisi</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.kondisi}</td>
                  </tr>
                  <tr>
                      <td>Jenis Aset</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.jenis_aset == 'habis_pakai' ? 'Habis Pakai' : 'Tidak Habis Pakai'}</td>
                  </tr>
                  <tr>
                      <td>Deskripsi</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.deskripsi ? data.deskripsi : '-'}</td>
                  </tr>
              </table>
            `)
        }
    </script>
@endsection
