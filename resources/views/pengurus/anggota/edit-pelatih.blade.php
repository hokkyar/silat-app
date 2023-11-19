@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="/pengurus">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="/pengurus/kelola/anggota">Anggota</a></div>
                <div class="breadcrumb-item active">Edit Pelatih</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Edit Pelatih</h4>
                </div>
                <form id="form-data" action="{{ route('anggota.update', $anggota->id) }}" method="POST"
                    class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input name="nama" id="nama" type="text" class="form-control" required
                                autocomplete="off" value="{{ $errors->any() ? old('nama') : $anggota->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" required
                                autocomplete="off"
                                value="{{ $errors->any() ? old('tempat_lahir') : $anggota->tempat_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control" required
                                autocomplete="off"
                                value="{{ $errors->any() ? old('tanggal_lahir') : $anggota->tanggal_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="nomor_sertifikasi">Nomor Sertifikasi</label>
                            <input name="nomor_sertifikasi" id="nomor_sertifikasi" type="text" class="form-control"
                                required autocomplete="off"
                                value="{{ $errors->any() ? old('nomor_sertifikasi') : $anggota->nomor_sertifikasi }}">
                        </div>
                        <div class="form-group">
                            <label>Foto Sertifikasi</label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="foto_sertifikasi">Choose file</label>
                                <input name="foto_sertifikasi" type="file" class="custom-file-input"
                                    id="foto_sertifikasi" accept="image/*">
                            </div>
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
            let nama = $('input[name="nama"]').val()
            let tempat_lahir = $('input[name="tempat_lahir"]').val()
            let nomor_sertifikasi = $('input[name="nomor_sertifikasi"]').val()
            if (nama != '' && tempat_lahir != '' && nomor_sertifikasi != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
