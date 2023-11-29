@extends('layouts.admin')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="text-primary">Struktur Organisasi Cabor {{ Str::title($data->nama_cabor) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/admin">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Struktur</div>
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
                                                <th>Nama Pengurus</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($data->struktur as $s)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ Str::title($s->nama_pengurus) }}</td>
                                                    <td>{{ Str::title($s->jabatan) }}</td>
                                                    <td>
                                                        <div class="badge badge-success">Aktif</div>
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
