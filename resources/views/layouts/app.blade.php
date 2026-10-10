<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        @yield('title', 'HMI Cabang Indramayu')
    </title>

    <meta
        name="description"
        content="@yield('description', 'Website resmi HMI Cabang Indramayu')"
    >


    {{-- =========================================================
    BOOTSTRAP
    ========================================================== --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- =========================================================
    BOOTSTRAP ICONS
    ========================================================== --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >


    {{-- =========================================================
    GOOGLE FONTS
    ========================================================== --}}

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >


    {{-- =========================================================
    CSS PUBLIC
    ========================================================== --}}

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    @stack('styles')

</head>


<body>


    {{-- =========================================================
    NAVBAR PUBLIC
    ========================================================== --}}

    @include('partials.navbar')


    {{-- =========================================================
    CONTENT PUBLIC
    ========================================================== --}}

    <main>

        @yield('content')

    </main>


    {{-- =========================================================
    FOOTER PUBLIC
    ========================================================== --}}

    @include('partials.footer')


    {{-- =========================================================
    BOOTSTRAP JS
    ========================================================== --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>


    {{-- =========================================================
    GLOBAL JAVASCRIPT
    ========================================================== --}}

    <script
        src="{{ asset('js/main.js') }}"
    ></script>


    {{-- =========================================================
    PAGE-SPECIFIC JAVASCRIPT
    ========================================================== --}}

    @stack('scripts')


</body>

</html>
