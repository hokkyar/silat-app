@extends('layouts.admin')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Pengurus</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/admin">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Pengurus</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>List Pengurus</h4>
                    <div class="pull-right ml-auto">
                        <a href="/admin/pengurus/create" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>
                            Tambah Data
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
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Cabor</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ Str::title($user->role) }}</td>
                                                    <td>{{ Str::title($user->cabor->nama_cabor) }}</td>
                                                    <td>
                                                        <a href="/admin/pengurus/{{ $user->id }}/edit"
                                                            class="btn btn-warning btn-sm mx-1 w-25"><i
                                                                class="fa fa-pen"></i></a>
                                                        <a data-confirm-delete="true"
                                                            href="{{ route('pengurus.destroy', $user->id) }}"
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
