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
                        <a href="/berita/admin/input" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>
                            Tambah
                            Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="responsive-tb_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            Ini List Pengurus
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
