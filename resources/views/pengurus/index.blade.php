@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Selamat datang, {{ '@' . session('user')->username }}!</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Tentang Cabor {{ session('cabor')->nama_cabor }}</h4>
                    <div class="pull-right ml-auto">
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm"><i
                                class="fa fa-pen mx-2"></i>
                            Edit Deskripsi</button>
                    </div>
                </div>
                <div class="card-body">
                    {{ $cabor_desc }}
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Deskripsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-data" action="{{ route('cabor.desc') }}" method="POST" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <textarea name="desc" id="desc" class="form-control" aria-label="With textarea">{{ $cabor_desc }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button onclick="sendData()" id="submitButton" class="btn btn-warning"><i
                                class="fa fa-pen mx-2"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function sendData() {
            let desc = $('input[name="desc"]').val()
            if (desc != '') {
                $('#submitButton').prop('disabled', true).addClass('btn-progress');
                $('#form-data').submit();
            }
        }
    </script>
@endsection
