@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Struktur Cabor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="/pengurus">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="/pengurus/struktur">Struktur</a></div>
                <div class="breadcrumb-item active">Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Tambah Struktur</h4>
                </div>
                <form id="form-data" action="/pengurus/struktur" method="POST" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_pengurus">Nama Pengurus</label>
                            <input name="nama_pengurus" id="nama_pengurus" type="text" class="form-control" required
                                autocomplete="off" value="{{ old('nama_pengurus') }}">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input name="jabatan" id="jabatan" type="text" class="form-control" required
                                autocomplete="off" value="{{ old('jabatan') }}">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button onclick="sendData()" id="submitButton" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function sendData() {
            let nama_pengurus = $('input[name="nama_pengurus"]').val()
            if (nama_pengurus != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
