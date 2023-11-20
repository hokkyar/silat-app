@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Program</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="/pengurus">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="/pengurus/kelola/program">Program</a></div>
                <div class="breadcrumb-item active">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Tambah Program</h4>
                </div>
                <form id="form-data" action="{{ route('program.store') }}" method="POST" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_program">Nama Program</label>
                            <input name="nama_program" id="nama_program" type="text" class="form-control" required
                                autocomplete="off" value="{{ old('nama_program') }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input name="tanggal" id="tanggal" type="date" class="form-control" required
                                autocomplete="off" value="{{ old('tanggal') }}">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Program</label>
                            <select required name="jenis" class="js-example-basic-single form-control">
                                <option value="latihan">Latihan</option>
                                <option value="kejuaraan">Kejuaraan</option>
                                <option value="try_out">Try Out</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input name="lokasi" id="lokasi" type="text" class="form-control" autocomplete="off"
                                value="{{ old('lokasi') }}">
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
            let nama_program = $('input[name="nama_program"]').val()
            let tanggal = $('input[name="tanggal"]').val()
            if (nama_program != '' && tanggal != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
