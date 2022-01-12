@extends('master.layout')

@section('title', 'Create Post')

@section('content')

    <br><br><br><br>

{{-- Klo sukses --}}
@if(Session::has('success'))
<div class="alert alert-success text-center">
  <h4>
    {{ Session::get('success') }}
  </h4>
    @php
        Session::forget('success');
    @endphp
</div>
@endif
{{-- Klo ada error --}}
@if($errors->any())
<div class="alert alert-danger">
    <p><strong>Opps Something went wrong</strong></p>
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif
{{-- form --}}
        <form action="/send_post/{{$user->id}}" method="POST">
            @csrf
            @foreach ($courses as $course)
                <input type="radio" required name="courses_id" id="courses_id" value="{{$course->id}}">
                {{$course->name}}
            @endforeach
            <br>
            <label for="title">Title</label>
            <br>
            <input type="text" name="title" id="title" required>
            <br>
            <label for="description"> Write here</label>
            <br>
            <textarea name="description" id="description" cols="30" rows="10" required>
            </textarea>
            <br>
            <button type="submit">Create Post</button>
        </form>



@endsection
