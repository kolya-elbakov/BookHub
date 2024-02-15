{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Вход</title>--}}
{{--    <link rel="stylesheet" href="styles.css">--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}
{{--    <h2>Вход</h2>--}}
{{--    <form action="/login" method="POST">--}}
{{--        <input type="email" name="email" placeholder="Email" required>--}}
{{--        <input type="password" name="password" placeholder="Пароль" required>--}}
{{--        <button type="submit">Войти</button>--}}
{{--    </form>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}

{{--<style>--}}
{{--    body {--}}
{{--        font-family: Arial, sans-serif;--}}
{{--        background-color: #f0f0f0;--}}
{{--    }--}}

{{--    .container {--}}
{{--        width: 50%;--}}
{{--        margin: 50px auto;--}}
{{--        padding: 20px;--}}
{{--        background-color: #fff;--}}
{{--        border-radius: 5px;--}}
{{--        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);--}}
{{--    }--}}

{{--    h2 {--}}
{{--        text-align: center;--}}
{{--    }--}}

{{--    input {--}}
{{--        width: 100%;--}}
{{--        margin: 10px 0;--}}
{{--        padding: 10px;--}}
{{--        border: 1px solid #ccc;--}}
{{--        border-radius: 5px;--}}
{{--    }--}}

{{--    button {--}}
{{--        width: 100%;--}}
{{--        padding: 10px;--}}
{{--        background-color: #3498db;--}}
{{--        color: #fff;--}}
{{--        border: none;--}}
{{--        border-radius: 5px;--}}
{{--        cursor: pointer;--}}
{{--    }--}}

{{--    button:hover {--}}
{{--        background-color: #2980b9;--}}
{{--    }--}}
{{--</style>--}}
@extends('auth.layouts')
@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.custom') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                           required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
