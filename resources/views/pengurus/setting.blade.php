@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Ubah Password</h4>
                </div>
                <form id="form-data" action="{{ route('setting.update-password') }}" method="POST" class="needs-validation"
                    novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input name="old_password" id="old_password" type="text" class="form-control" required
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input name="new_password" id="new_password" type="text" class="form-control" required
                                autocomplete="off">
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
            let old_password = $('input[name="old_password"]').val()
            let new_password = $('input[name="new_password"]').val()
            if (old_password != '' && new_password != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
