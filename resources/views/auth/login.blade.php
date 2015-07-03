<!-- resources/views/auth/login.blade.php -->
@extends('layouts.main')

@section('content')
        <div class="container-fluid">
            <div class="content">
                <h1>Login Page</h1>
            </div>
            <div class="content">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- resources/views/auth/login.blade.php -->
                <form method="POST" action="/auth/login">
                    {!! csrf_field() !!}

                    <div class="form-groups">
                        <div class="form-label"> Email</div>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-groups">
                        <div class="form-label">Password</div>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>

                    <div class="form-groups">
                        <input type="checkbox" name="remember"> Remember Me
                    </div>

                    <div class="form-groups">
                        <button type="submit">Login</button>
                        &nbsp;Or&nbsp;<a href="/auth/register">Sign Up</a>
                    </div>
                </form>

            </div>
        </div>
@stop


