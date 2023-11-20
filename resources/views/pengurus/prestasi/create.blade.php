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
                <div class="breadcrumb-item active">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Tambah Prestasi</h4>
                </div>
                <form id="form-data" action="{{ route('prestasi.store') }}" method="POST" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kejuaraan">Nama Kejuaraan</label>
                            <input name="nama_kejuaraan" id="nama_kejuaraan" type="text" class="form-control" required
                                autocomplete="off" value="{{ old('nama_kejuaraan') }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input name="tanggal" id="tanggal" type="date" class="form-control" required
                                autocomplete="off" value="{{ old('tanggal') }}">
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input name="prestasi" id="prestasi" type="text" class="form-control" autocomplete="off"
                                value="{{ old('prestasi') }}">
                        </div>
                        <div class="form-group">
                            <label for="sertifikat">Sertifikat</label>
                            <input name="sertifikat" id="sertifikat" type="text" class="form-control" autocomplete="off"
                                value="{{ old('sertifikat') }}">
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
                            <textarea name="deskripsi" id="deskripsi" class="form-control" aria-label="With textarea">{{ old('deskripsi') }}</textarea>
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
