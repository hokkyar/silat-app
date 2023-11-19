@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/pengurus">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Anggota</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">List Anggota Cabor {{ Str::title(session('cabor')->nama_cabor) }}</h4>
                    <div class="pull-right ml-auto">
                        <a href="/pengurus/kelola/anggota/create?j=pelatih" class="btn btn-success btn-sm"><i
                                class="fas fa-plus"></i>
                            Tambah Pelatih</a>
                        <a href="/pengurus/kelola/anggota/create?j=atlet" class="btn btn-success btn-sm"><i
                                class="fas fa-plus"></i>
                            Tambah Atlet</a>
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
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($all_anggota as $anggota)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $anggota->nama }}</td>
                                                    <td>{{ Str::title($anggota->jenis) }}</td>
                                                    <td>
                                                        <div class="badge badge-success">Aktif</div>
                                                    </td>
                                                    <td>
                                                        <button onclick="viewData({{ json_encode($anggota) }})"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            class="btn btn-primary btn-sm w-25"><i
                                                                class="fa fa-info-circle"></i></button>
                                                        <a href="{{ route('anggota.edit', $anggota->id) }}"
                                                            class="btn btn-warning btn-sm mx-1 w-25"><i
                                                                class="fa fa-pen"></i></a>
                                                        <a data-confirm-delete="true"
                                                            href="{{ route('anggota.destroy', $anggota->id) }}"
                                                            class="btn btn-danger btn-sm w-25"><i
                                                                class="fa fa-trash text-white"></i></a>
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
                    <h5 class="modal-title">Detail Anggota</h5>
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
            if (data.jenis == 'pelatih') {
                const fotoSertifikasi = '{{ asset('storage/uploads/') }}' + '/' + data.foto_sertifikasi;
                $('.modal-body').append(`
              <table style="font-size: 18px;">
                  <tr>
                      <td>Nama</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.nama}</td>
                  </tr>
                  <tr>
                      <td>Tempat/Tgl Lahir</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.tempat_lahir}, ${data.tanggal_lahir}</td>
                  </tr>
                  <tr>
                      <td>Nomor Sertifikasi</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.nomor_sertifikasi}</td>
                  </tr>
                  <tr>
                      <td>Foto Sertifikasi</td>
                      <td style="padding: 0 10px;">:</td>
                  </tr>
              </table>
              <img class="rounded my-3" style="max-width: 350px;" src="${fotoSertifikasi}">
            `)
            } else {
                $('.modal-body').append(`
              <table style="font-size: 18px;">
                  <tr>
                      <td>Nama</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.nama}</td>
                  </tr>
                  <tr>
                      <td>Tempat/Tgl Lahir</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.tempat_lahir}, ${data.tanggal_lahir}</td>
                  </tr>
                  <tr>
                      <td>Nomor KTA</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.nomor_kta}</td>
                  </tr>
                  <tr>
                      <td>Asal Sekolah/PT</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>${data.sekolah_pt}</td>
                  </tr>
              </table>
            `)
            }
        }
    </script>
@endsection
