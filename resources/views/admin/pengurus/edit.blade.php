@extends('layouts.admin')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kelola Pengurus</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="/admin">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><a href="/admin/pengurus">Pengurus</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Edit Pengurus</h4>
                </div>
                <form id="form-data" action="{{ route('pengurus.update', $pengurus->id) }}" method="POST"
                    class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" id="username" type="text" class="form-control" required
                                autocomplete="off" value="{{ $errors->any() ? old('username') : $pengurus->username }}">
                        </div>
                        <div class="form-group">
                            <label>Cabor</label>
                            <select name="cabor_id" class="js-example-basic-single form-control">
                                @foreach ($all_cabor as $cabor)
                                    <option value="{{ $cabor->id }}"
                                        {{ $errors->any() && old('cabor_id') == $cabor->id ? 'selected' : '' }}
                                        {{ !$errors->any() && $pengurus->cabor_id == $cabor->id ? 'selected' : '' }}>
                                        {{ $cabor->nama_cabor }}
                                    </option>
                                @endforeach
                            </select>
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
            let username = $('input[name="username"]').val()
            if (username != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
