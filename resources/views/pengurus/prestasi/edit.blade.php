@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Prestasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="/pengurus">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="/pengurus/kelola/prestasi">Prestasi</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Edit Prestasi</h4>
                </div>
                <form id="form-data" action="{{ route('prestasi.update', $prestasi->id) }}" method="POST"
                    class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kejuaraan">Nama Kejuaraan</label>
                            <input name="nama_kejuaraan" id="nama_kejuaraan" type="text" class="form-control" required
                                autocomplete="off"
                                value="{{ $errors->any() ? old('nama_kejuaraan') : $prestasi->nama_kejuaraan }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input name="tanggal" id="tanggal" type="date" class="form-control" required
                                autocomplete="off" value="{{ $errors->any() ? old('tanggal') : $prestasi->tanggal }}">
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input name="prestasi" id="prestasi" type="text" class="form-control" autocomplete="off"
                                value="{{ $errors->any() ? old('prestasi') : $prestasi->prestasi }}">
                        </div>
                        <div class="form-group">
                            <label for="sertifikat">Sertifikat</label>
                            <input name="sertifikat" id="sertifikat" type="text" class="form-control" autocomplete="off"
                                value="{{ $errors->any() ? old('sertifikat') : $prestasi->sertifikat }}">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="foto">Choose file</label>
                                <input name="foto" type="file" class="custom-file-input" id="foto"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Tambahan</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" aria-label="With textarea">{{ $errors->any() ? old('deskripsi') : $prestasi->deskripsi }}</textarea>
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
            let nama_kejuaraan = $('input[name="nama_kejuaraan"]').val()
            let tanggal = $('input[name="tanggal"]').val()
            if (nama_kejuaraan != '' && tanggal != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
