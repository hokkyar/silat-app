@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Inventaris</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="/pengurus">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="/pengurus/kelola/inventaris">Inventaris</a></div>
                <div class="breadcrumb-item active">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Tambah Inventaris</h4>
                </div>
                <form id="form-data" action="{{ route('inventaris.store') }}" method="POST" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis_barang">Jenis Barang</label>
                            <input name="jenis_barang" id="jenis_barang" type="text" class="form-control" required
                                autocomplete="off" value="{{ old('jenis_barang') }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input name="tanggal" id="tanggal" type="date" class="form-control" required
                                autocomplete="off" value="{{ old('tanggal') }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_satuan">Harga Satuan</label>
                            <input name="harga_satuan" id="harga_satuan" type="text" class="form-control" required
                                autocomplete="off" value="{{ old('harga_satuan') }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input name="jumlah" id="jumlah" type="number" class="form-control" required
                                autocomplete="off" value="{{ old('jumlah') }}">
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <input name="kondisi" id="kondisi" type="text" class="form-control" required
                                autocomplete="off" value="{{ old('kondisi') }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_satuan">Jenis Aset</label>
                            <select name="jenis_aset" class="custom-select">
                                <option value="habis_pakai">Habis Pakai</option>
                                <option value="tidak_habis_pakai">Tidak Habis Pakai</option>
                            </select>
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
            let jenis_barang = $('input[name="jenis_barang"]').val()
            let harga_satuan = $('input[name="harga_satuan"]').val()
            let jumlah = $('input[name="jumlah"]').val()
            let kondisi = $('input[name="kondisi"]').val()
            let tanggal = $('input[name="tanggal"]').val()
            if (jenis_barang != '' && tanggal != '' && harga_satuan != '' && jumlah != '' && kondisi != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
