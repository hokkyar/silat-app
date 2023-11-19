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
            </div>
        </div>
    </section>
@endsection
