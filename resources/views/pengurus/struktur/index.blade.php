@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Struktur Cabor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/pengurus">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Struktur</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Struktur Cabor {{ Str::title(session('cabor')->nama_cabor) }}</h4>
                    <div class="pull-right ml-auto">
                        <a href="/pengurus/struktur/create" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>
                            Tambah
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
                                                <th>Nama Pengurus</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($all_struktur as $s)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ Str::title($s->nama_pengurus) }}</td>
                                                    <td>{{ Str::title($s->jabatan) }}</td>
                                                    <td>
                                                        <div class="badge badge-success">Aktif</div>
                                                    </td>
                                                    <td>
                                                        <a href="/pengurus/struktur/{{ $s->id }}/edit"
                                                            class="btn btn-warning btn-sm mx-1 w-25"><i
                                                                class="fa fa-pen"></i></a>
                                                        <a data-confirm-delete="true"
                                                            href="{{ route('struktur.destroy', $s->id) }}"
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
@endsection
