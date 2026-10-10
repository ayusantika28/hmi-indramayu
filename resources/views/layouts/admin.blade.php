<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Admin') | HMI Cabang Indramayu
    </title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Admin CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}">

    @stack('styles')
</head>

<body>

<div class="admin-wrapper">

    {{-- ======================================================
         SIDEBAR
    ======================================================= --}}
    <aside class="admin-sidebar" id="adminSidebar">

        {{-- BRAND --}}
        <div class="admin-brand">

            <a href="{{ route('admin.dashboard') }}"
               class="admin-brand-link">

                <img
                    src="{{ asset('images/logo-hmi.jpg') }}"
                    alt="Logo HMI">

                <div class="admin-brand-text">

                    <strong>HMI</strong>

                    <small>
                        Cabang Indramayu
                    </small>

                </div>

            </a>

        </div>


        {{-- ==================================================
             SIDEBAR MENU
        =================================================== --}}
        <div class="admin-sidebar-content">

            {{-- ==================== UTAMA ==================== --}}
            <div class="admin-menu-title">
                UTAMA
            </div>


            {{-- DASHBOARD --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-menu-item
                {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- ==================== KONTEN ==================== --}}
            <div class="admin-menu-title">
                KONTEN
            </div>


            {{-- BERITA --}}
            <a
                href="{{ route('admin.berita.index') }}"
                class="admin-menu-item
                {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

                <i class="bi bi-newspaper"></i>

                <span>
                    Berita
                </span>

            </a>


            {{-- ORGANISASI --}}
            <a
                href="{{ route('admin.organisasi.index') }}"
                class="admin-menu-item
                {{ request()->routeIs('admin.organisasi.*') ? 'active' : '' }}">

                <i class="bi bi-diagram-3-fill"></i>

                <span>
                    Organisasi
                </span>

            </a>


            {{-- KOMISARIAT --}}
            <a
                href="{{ route('admin.komisariat.index') }}"
                class="admin-menu-item
                {{ request()->routeIs('admin.komisariat.*') ? 'active' : '' }}">

                <i class="bi bi-building-fill"></i>

                <span>
                    Komisariat
                </span>

            </a>


            {{-- KEGIATAN --}}
            <a
                href="{{ route('admin.kegiatan.index') }}"
                class="admin-menu-item
                {{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}">

                <i class="bi bi-calendar-event-fill"></i>

                <span>
                    Kegiatan
                </span>

            </a>


            {{-- ==================== WEBSITE ==================== --}}
            <div class="admin-menu-title">
                WEBSITE
            </div>


            {{-- LIHAT WEBSITE --}}
            <a
                href="{{ route('home') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="admin-menu-item">

                <i class="bi bi-globe2"></i>

                <span>
                    Lihat Website
                </span>

                <i class="bi bi-box-arrow-up-right ms-auto small"></i>

            </a>

        </div>


        {{-- ======================================================
             SIDEBAR BOTTOM
        ======================================================= --}}
        <div class="admin-sidebar-bottom">

            {{-- USER MINI --}}
            <div class="admin-user-mini">

                <div class="admin-user-avatar">

                    <i class="bi bi-person-fill"></i>

                </div>


                <div class="admin-user-text">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <small>
                        Administrator
                    </small>

                </div>

            </div>


            {{-- LOGOUT --}}
            <form
                method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="admin-menu-item admin-logout">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- ======================================================
         MAIN
    ======================================================= --}}
    <div class="admin-main">


        {{-- ==================================================
             TOP NAVBAR
        =================================================== --}}
        <header class="admin-navbar">

            {{-- LEFT --}}
            <div class="admin-navbar-left">

                {{-- SIDEBAR TOGGLE --}}
                <button
                    type="button"
                    class="admin-sidebar-toggle"
                    id="sidebarToggle"
                    aria-label="Buka atau tutup sidebar">

                    <i class="bi bi-list"></i>

                </button>


                {{-- PAGE HEADING --}}
                <div class="admin-page-heading">

                    <h5>
                        @yield('page-title', 'Dashboard')
                    </h5>

                    <small>
                        HMI Cabang Indramayu
                    </small>

                </div>

            </div>


            {{-- RIGHT --}}
<div class="admin-navbar-right">

    {{-- LIHAT WEBSITE --}}
    <a
        href="{{ route('home') }}"
        target="_blank"
        rel="noopener noreferrer"
        class="admin-view-site">

        <i class="bi bi-eye"></i>

        <span>
            Lihat Website
        </span>

    </a>


    {{-- PENGATURAN PROFIL --}}
    <a
        href="{{ route('admin.profile-setting.edit') }}"
        class="admin-view-site">

        <i class="bi bi-gear"></i>

        <span>
            Pengaturan
        </span>

    </a>


    {{-- USER --}}
    <div class="admin-user">

        <div class="admin-user-avatar">

            <i class="bi bi-person-fill"></i>

        </div>


        <div class="admin-user-text">

            <strong>
                {{ auth()->user()->name }}
            </strong>

            <small>
                Administrator
            </small>

        </div>

    </div>

</div>

        </header>


        {{-- ==================================================
             CONTENT
        =================================================== --}}
        <main class="admin-content">

            {{-- SUCCESS --}}
            @if(session('success'))

                <div
                    class="alert alert-success alert-dismissible fade show admin-alert"
                    role="alert">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>

                </div>

            @endif


            {{-- ERROR --}}
            @if(session('error'))

                <div
                    class="alert alert-danger alert-dismissible fade show admin-alert"
                    role="alert">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>

                </div>

            @endif


            {{-- VALIDATION ERROR --}}
            @if($errors->any())

                <div
                    class="alert alert-danger alert-dismissible fade show admin-alert"
                    role="alert">

                    <div class="fw-semibold mb-2">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Terjadi kesalahan:
                    </div>

                    <ul class="mb-0 ps-4">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>

                </div>

            @endif


            {{-- PAGE CONTENT --}}
            @yield('content')

        </main>

    </div>

</div>


{{-- ==========================================================
     BOOTSTRAP JS
=========================================================== --}}
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


{{-- ==========================================================
     SIDEBAR TOGGLE
=========================================================== --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const toggle = document.getElementById('sidebarToggle');
    const wrapper = document.querySelector('.admin-wrapper');

    if (!toggle || !wrapper) {
        return;
    }

    toggle.addEventListener('click', function () {

        wrapper.classList.toggle('sidebar-open');

    });

});

</script>


{{-- ==========================================================
     PAGE SCRIPTS
=========================================================== --}}
@stack('scripts')

</body>
</html>
