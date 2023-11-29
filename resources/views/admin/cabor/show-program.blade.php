@extends('layouts.admin')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="text-primary">Data Program Cabor {{ Str::title($data->nama_cabor) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/admin">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Program</div>
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
                                                <th>Nama Program</th>
                                                <th>Jenis</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($data->program as $program)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $program->tanggal }}</td>
                                                    <td>{{ Str::title($program->nama_program) }}</td>
                                                    <td>
                                                        @if ($program->jenis == 'latihan')
                                                            <div class="badge badge-primary">
                                                                Latihan
                                                            </div>
                                                        @endif
                                                        @if ($program->jenis == 'kejuaraan')
                                                            <div class="badge"
                                                                style="background: rgb(150, 10, 150); color: white;">
                                                                Kejuaraan
                                                            </div>
                                                        @endif
                                                        @if ($program->jenis == 'try_out')
                                                            <div class="badge badge-secondary">Try Out</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button onclick="viewData({{ json_encode($program) }})"
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
                    <h5 class="modal-title">Detail Program</h5>
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
                      <td>Nama Program</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.nama_program}</td>
                  </tr>
                  <tr>
                      <td>Tanggal Program</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.tanggal}</td>
                  </tr>
                  <tr>
                      <td>Jenis</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.jenis === 'try_out' ? 'Try Out' : (data.jenis).toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')}</td>
                  </tr>
                  <tr>
                      <td>Lokasi</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.lokasi ? data.lokasi : '-'}</td>
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
