@extends('layouts.pengurus')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Selamat datang, {{ '@' . session('user')->username }}!</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Dashboard</h4>
                </div>
            </div>
        </div>
    </section>
@endsection
