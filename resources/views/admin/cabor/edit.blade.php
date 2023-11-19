@extends('layouts.admin')
@section('content')
    <section class="section">

        <div class="section-header">
            <h1>Kelola Cabor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/admin">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/admin/cabor">Cabor</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Edit Cabor</h4>
                </div>
                <form id="form-data" action="{{ route('cabor.update', $cabor->id) }}" method="POST"
                    class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_cabor">Nama Cabor</label>
                            <input name="nama_cabor" value="{{ $cabor->nama_cabor }}" id="nama_cabor" type="text"
                                class="form-control" required autocomplete="off">
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
            let nama_cabor = $('input[name="nama_cabor"]').val()
            if (nama_cabor != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
