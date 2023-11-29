@extends('layouts.admin')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Cabor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/admin">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Cabor</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">List Cabor</h4>
                    <div class="pull-right ml-auto">
                        <a href="/admin/cabor/create" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah
                            Data</a>
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
                                                <th>Nama Cabor</th>
                                                <th>Tahun</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($all_cabor as $cabor)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $cabor->nama_cabor }}</td>
                                                    <td>2023</td>
                                                    <td>
                                                        <div class="badge badge-success">Aktif</div>
                                                    </td>
                                                    <td>
                                                        <button onclick="viewData({{ json_encode($cabor) }})"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            class="btn btn-primary btn-sm w-25"><i
                                                                class="fa fa-info-circle"></i></button>
                                                        <a href="/admin/cabor/{{ $cabor->id }}/edit"
                                                            class="btn btn-warning btn-sm mx-1 w-25"><i
                                                                class="fa fa-pen"></i></a>
                                                        <a data-confirm-delete="true"
                                                            href="{{ route('cabor.destroy', $cabor->id) }}"
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nama_cabor"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action">1. Struktur Organisasi</a>
                        <a href="" class="list-group-item list-group-item-action">2. Pelatih dan Atlet</a>
                        <a href="" class="list-group-item list-group-item-action">3. Program</a>
                        <a href="" class="list-group-item list-group-item-action">4. Prestasi</a>
                        <a href="" class="list-group-item list-group-item-action">5. Inventaris</a>
                    </div>
                </div>
                <a class="btn mx-4" data-toggle="collapse" href="#collapseDeskripsi" role="button">
                    Tentang Cabor
                </a>
                <div class="collapse mx-4 show" id="collapseDeskripsi">
                    Belum ada deskripsi...
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const feature = ['struktur', 'anggota', 'program', 'prestasi', 'inventaris'];

        function viewData(data) {
            $('.list-group-item').each(function(index) {
                $(this).attr('href', `/admin/cabor/${data.id}?d=${feature[index]}`);
            });
            $('#nama_cabor').text('Cabor ' + data.nama_cabor);
            $('#collapseDeskripsi').text(data.desc);
        }
    </script>
@endsection
