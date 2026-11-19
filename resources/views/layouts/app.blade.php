
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'SIAKAD')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #26344a;
        }

        /* NAVBAR */
        .navbar {
            background: #172b4d;
            color: white;
            padding: 18px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 3px 12px rgba(0,0,0,.12);
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .brand span {
            color: #55b5ff;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-menu a {
            color: #e5edf8;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-menu a:hover {
            color: #55b5ff;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 9px 17px;
            border-radius: 7px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        /* CONTENT */
        main {
            min-height: 75vh;
            padding: 35px 6%;
        }

        .container {
            width: 100%;
            max-width: 1150px;
            margin: auto;
        }

        h2 {
            color: #172b4d;
        }

        /* DASHBOARD CARDS */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 25px 0;
        }

        .col-md-4 {
            flex: 1 1 220px;
        }

        .panel {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(30,50,80,.07);
            border: 1px solid #e8edf5;
        }

        .panel-heading {
            padding: 15px 20px;
            font-weight: bold;
            color: white;
        }

        .panel-primary .panel-heading {
            background: #2675d8;
        }

        .panel-success .panel-heading {
            background: #16a085;
        }

        .panel-warning .panel-heading {
            background: #e5a323;
        }

        .panel-body {
            padding: 20px;
        }

        .panel-body h2 {
            font-size: 32px;
            margin: 5px 0;
        }

        /* MENU */
        .list-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .list-group-item {
            display: block;
            background: white;
            padding: 20px;
            border-radius: 10px;
            color: #2675d8;
            text-decoration: none;
            border: 1px solid #e8edf5;
            transition: .2s;
        }

        .list-group-item:hover {
            background: #edf5ff;
            transform: translateY(-3px);
        }

        /* FORM LOGIN DAN REGISTER */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: inline-block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #dce3ed;
            border-radius: 7px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #2675d8;
            box-shadow: 0 0 0 3px rgba(38,117,216,.12);
        }

        .btn {
            display: inline-block;
            background: #2675d8;
            color: white;
            padding: 11px 20px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background: #185cae;
        }

        .btn-link {
            background: transparent;
            color: #2675d8;
            text-decoration: none;
            padding: 10px;
        }

        .alert {
            padding: 13px;
            border-radius: 7px;
            margin-bottom: 18px;
            background: #e8f5ee;
            color: #20734b;
        }

        .has-error .form-control {
            border-color: #e74c3c;
        }

        .help-block {
            color: #e74c3c;
            font-size: 13px;
        }

        /* LOGIN PANEL */
        .panel-default {
            max-width: 500px;
            margin: 25px auto;
        }

        .panel-default .panel-heading {
            background: #172b4d;
            font-size: 18px;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 22px;
            color: #8793a5;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 5%;
            }

            main {
                padding: 25px 5%;
            }

            .nav-menu {
                gap: 12px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="brand">
            SI<span>AKAD</span>
        </div>

        @if (Auth::check())
            <nav class="nav-menu">
                <a href="{{ url('/home') }}">Dashboard</a>
                <a href="{{ url('/mahasiswa') }}">Mahasiswa</a>
                <a href="{{ url('/dosen') }}">Dosen</a>
                <a href="{{ url('/jurusan') }}">Jurusan</a>
                <a href="{{ url('/mata-kuliah') }}">Mata Kuliah</a>

                <form action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
            </nav>
        @else
            <nav class="nav-menu">
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            </nav>
        @endif
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2026 SIAKAD - Sistem Informasi Akademik
    </footer>

</body>
</html>
