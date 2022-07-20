@extends('layout')

@section('content')

<h1>Neko Helper Login</h1>

<form id="neko-touroku" method="POST" action="/users/authenticate">
    @csrf
    {{-- Stops people from creating a form that targets my db and submitting BS data --}}
    {{-- <div id="post-cat-wrapper">

    </div> --}}
    
    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="email">
            Email
        </label>
        <input type="email" name="email" placeholder="bakeneko@inbox.vacamon" value="{{old('email')}}">

        @error('email')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="password">
            Password
        </label>
        <input type="password" name="password" placeholder="Variety is the spice of good passwords" value="{{old('password')}}">

        @error('password')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="neko-touroku-btn">Yup, that's me</button>

    <div>Don't have an account? <a href="/register">Join the Neko Helper Army!</a></div>

</form>

@endsection