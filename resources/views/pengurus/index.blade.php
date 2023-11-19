@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Selamat datang, {{ '@' . session('user')->username }}!</h1>
        </div>
    </section>
@endsection
