@extends('master.layout')

@section('title', 'Login')
<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">

@section('content')
        <form method="POST" action='/register' enctype="multipart/form-data" class="form">
            @csrf
            <div class="form_row">
                <div class="label_column">
                    <label for="name">Full Name</label>
                </div>
                <div class="input_column flex_column">
                    <input type="text" id="name" name="name" placeholder="Min. 4 characters" class="textbox" @error('name') is-invalid @enderror>
                    @error('name')
                        <p class="errorAlert">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for="gender">Gender</label>
                </div>
                <div class="input_column">
                    <input type="radio" id="male" name="gender" value="male" @error('gender') is-invalid @enderror>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" @error('gender') is-invalid @enderror>
                    <label for="female">Female</label>
                    @error('gender')
                        <p class="errorAlert">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for="dob">Date of Birth</label>
                </div>
                <div class="input_column flex_column">
                    <input type="date" id="dob" name="dob" class="textbox">
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for="username">Username</label>
                </div>
                <div class="input_column flex_column">
                    <input type="text" id="username" name="username" placeholder="" class="textbox" @error('username') is-invalid @enderror>
                    @error('username')
                        <p class="errorAlert">{{$message}}</p>
                    @enderror
                </div>
            </div>
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
                    <input type="password" id="password" name="password" placeholder="Min. 8 characters" class="textbox" @error('password') is-invalid @enderror>
                    @error('password')
                        <p class="errorAlert">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <div class="input_column flex_column">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="" class="textbox" @error('password_confirmation') is-invalid @enderror>
                    @error('password_confirmation')
                        <p class="errorAlert">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form_row">
                <div class="label_column">
                    <label for=""></label>
                </div>
                <div class="input_column">
                    <input type="submit" value="Register" class="submit_button">
                </div>
            </div>
        </form>
@endsection
