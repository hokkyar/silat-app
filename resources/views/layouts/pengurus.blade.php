@extends('layouts.app')
@section('title', 'SILAT - Pengurus')
@section('body')
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <img alt="image" src="https://www.konibuleleng.or.id/assets/logo.ico" class="rounded-circle mr-2 mb-1"
                width="27">
            <a href="index.html" class="navbar-brand sidebar-gone-hide">SILAT</a>
            <div class="navbar-nav">
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            </div>
            <ul class="navbar-nav ml-auto navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"
                        aria-expanded="false">
                        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">
                            Hi, Nama Pengurus
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/login/logout" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('pengurus') ? 'active' : '' }}">
                        <a href="/pengurus" class="nav-link"><i class="fa fa-home"></i></i><span>Home</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('pengurus/struktur*') ? 'active' : '' }}">
                        <a href="/pengurus/struktur" class="nav-link"><i class="fa fa-sitemap"></i><span>Struktur</span></a>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('pengurus/kelola*') ? 'active' : '' }}">
                        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                class="far fa-clone"></i><span>Kelola Data</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item {{ Request::is('pengurus/kelola/anggota*') ? 'active' : '' }}">
                                <a href="/pengurus/kelola/anggota" class="nav-link"><i class="fa fa-users"></i><span
                                        class="ml-2">Pelatih & Atlet</span></a>
                            </li>
                            <li class="nav-item {{ Request::is('pengurus/kelola/program*') ? 'active' : '' }}">
                                <a href="/pengurus/kelola/program" class="nav-link"><i class="fa fa-tasks"></i><span
                                        class="ml-2">Program</span></a>
                            </li>
                            <li class="nav-item {{ Request::is('pengurus/kelola/prestasi*') ? 'active' : '' }}">
                                <a href="/pengurus/kelola/prestasi" class="nav-link"><i class="fa fa-trophy"></i><span
                                        class="ml-2">Prestasi</span></a>
                            </li>
                            <li class="nav-item {{ Request::is('pengurus/kelola/inventaris*') ? 'active' : '' }}">
                                <a href="/pengurus/kelola/inventaris" class="nav-link"><i class="fa fa-book"></i><span
                                        class="ml-2">Inventaris</span></a>
                            </li>
                        </ul>
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
                SILAT
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </div>
        </footer>
    </div>
@endsection