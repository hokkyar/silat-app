@extends('layouts.admin')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="text-primary">Data Prestasi Cabor {{ Str::title($data->nama_cabor) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/admin">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Prestasi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <a href="{{ route('download.data', $data->id) . '?d=prestasi' }}" class="btn btn-primary btn-md"><i
                                class="fa fa-file-pdf mx-1"></i>
                            Download PDF
                        </a>
                    </div>
                </div>
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
                                                <th>Nama Kejuaraan</th>
                                                <th>Prestasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($data->prestasi as $prestasi)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $prestasi->tanggal }}</td>
                                                    <td>{{ Str::title($prestasi->nama_kejuaraan) }}</td>
                                                    <td>{{ $prestasi->prestasi }}</td>
                                                    <td>
                                                        <button onclick="viewData({{ json_encode($prestasi) }})"
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
                    <h5 class="modal-title">Detail Prestasi</h5>
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
            const foto = '{{ asset('storage/uploads/') }}' + '/' + data.foto;
            $('.modal-body').append(`
              <table style="font-size: 18px;">
                  <tr>
                      <td>Nama Kejuaraan</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.nama_kejuaraan}</td>
                  </tr>
                  <tr>
                      <td>Tanggal</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.tanggal}</td>
                  </tr>
                  <tr>
                      <td>Prestasi</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.prestasi}</td>
                  </tr>
                  <tr>
                      <td>Sertifikat</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.sertifikat ? data.sertifikat : '-'}</td>
                  </tr>
                  <tr>
                      <td>Deskripsi</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.deskripsi ? data.deskripsi : '-'}</td>
                  </tr>
                  <tr>
                      <td>Foto</td>
                      <td style="padding: 0 10px;">:</td>
                  </tr>
              </table>
              <img class="rounded my-3" style="max-width: 350px;" src="${foto}">
            `)
        }
    </script>
@endsection
