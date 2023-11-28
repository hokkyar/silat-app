@extends('layouts.app')
@section('title', 'SIMLAT - Admin')
@section('body')
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <img alt="image" src="{{ asset('img/logo-koni.ico') }}" class="rounded-circle mr-2 mb-1" width="27">
            <a href="index.html" class="navbar-brand sidebar-gone-hide">SIMLAT</a>
            <div class="navbar-nav">
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            </div>
            <ul class="navbar-nav ml-auto navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"
                        aria-expanded="false">
                        <img alt="image"
                            src="https://th.bing.com/th/id/OIP.zW0R7waKPw1IOmG3METk6gHaHa?rs=1&pid=ImgDetMain"
                            class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">
                            Hi, Admin
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('setting') }}" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/logout" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a href="/admin" class="nav-link"><i class="fa fa-home"></i></i><span>Home</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/cabor*') ? 'active' : '' }}">
                        <a href="/admin/cabor" class="nav-link"><i class="fa fa-cubes"></i><span>Cabor</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/pengurus*') ? 'active' : '' }}">
                        <a href="/admin/pengurus" class="nav-link"><i class="fas fa-users"></i><span>Pengurus</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main-content" style="min-height: 1138px;">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="footer-left">
                Copyright ©
                SIMLAT
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </div>
        </footer>
    </div>
@endsection
