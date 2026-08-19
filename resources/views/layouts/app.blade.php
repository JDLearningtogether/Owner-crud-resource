<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Owner Management')
    </title>

    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-dark bg-dark">

        <div class="container">

            <a
                href="{{ route('owners.index') }}"
                class="navbar-brand"
            >
                Owner Management
            </a>

        </div>

    </nav>


    {{-- Main Content --}}
    <main>

        @yield('content')

    </main>


    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>