@extends('layout')

@section('content')

<h1>Neko Owner Registration</h1>

<form id="neko-touroku" method="POST" action="/users">
    @csrf
    {{-- Stops people from creating a form that targets my db and submitting BS data --}}
    {{-- <div id="post-cat-wrapper">

    </div> --}}
    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="name">
            Name
        </label>
        <input type="text" name="name" placeholder="Pawner Owner" value="{{old('name')}}">

        @error('name')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>
    
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

    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="password_confirmation">
            Password Confirmation
        </label>
        <input type="password" name="password_confirmation" placeholder="At least we didn't ask you to input your email confirmation" value="{{old('password-conf')}}">

        @error('password_confirmation')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <div class="neko-touroku-input">
        <label class="neko-touroku-label-lg" for="praise">
            Good wishes to the creator of the website
        </label>
        <textarea type="text" name="praise" placeholder="I love you man!">{{old('praise')}}</textarea>

        @error('desc')
            <p class="neko-touroku-error">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="neko-touroku-btn">Register my Neko</button>

</form>

@endsection