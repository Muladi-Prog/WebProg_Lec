@extends('master.layout')

@section('title', 'Login')
<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">

@section('content')
        <form method="POST" action='/login' enctype="multipart/form-data" class="form">
            @csrf
            <div class="form_row">
                <div class="label_column">
                    <label for="email">E-Mail Address</label>
                </div>
                <div class="input_column flex_column">
                    <input type="email" id="email" name="email" placeholder="" class="textbox" @error('email') is-invalid @enderror>
                    @error('email')
                        <p class="errorAlert">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for="password">Password</label>
                </div>
                <div class="input_column flex_column">
                    <input type="password" id="password" name="password" placeholder="" class="textbox" @error('password') is-invalid @enderror>
                    @error('password')
                        <p class="errorAlert">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                </div>
                <div class="input_column">
                    <input type="checkbox" id="remember" name="remember" class="checkbox">
                    <label for="remember">Remember Me</label>
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for=""></label>
                </div>
                <div class="input_column">
                    <input type="submit" value="Login" class="submit_button">
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for=""></label>
                </div>
                <div class="input_column">
                    <div class="errorAlert">
                        @foreach ($errors->all() as $error)
                            @if ($error == "Invalid Email or Password")
                                <p>{{$error}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
@endsection
