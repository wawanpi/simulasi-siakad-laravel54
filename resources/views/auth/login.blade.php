
@extends('layouts.app')

@section('title', 'Login - SIAKAD')

@section('content')

<div style="max-width:440px;margin:35px auto;">

    <div class="panel panel-default"
         style="border-radius:15px;overflow:hidden;">

        <div style="background:#172b4d;color:white;
                    padding:30px;text-align:center;">

            <h2 style="color:white;margin:0;">
                SIAKAD
            </h2>

            <p style="color:#cbd8eb;margin-top:10px;">
                Sistem Informasi Akademik
            </p>

        </div>

        <div class="panel-body" style="padding:30px;">

            <h3 style="text-align:center;">
                Selamat Datang
            </h3>

            <p style="text-align:center;color:#8793a5;">
                Silakan login untuk melanjutkan.
            </p>

            @if (session('status'))
                <div class="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email"
                           required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label style="font-weight:normal;">
                        <input type="checkbox" name="remember">
                        Ingat saya
                    </label>
                </div>

                <button type="submit"
                        class="btn"
                        style="width:100%;padding:13px;">
                    Login Sekarang
                </button>

            </form>

            <p style="text-align:center;margin-top:25px;">
                Belum memiliki akun?
                <a href="{{ route('register') }}">
                    Daftar sekarang
                </a>
            </p>

        </div>
    </div>

</div>

@endsection
