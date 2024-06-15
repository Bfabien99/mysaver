@extends('layout')
@section('main')
    <section>
        @if(session('error'))
            <p class="error">{{session('error')}}</p>
        @endif
        <form action="{{route('login-post')}}" method="post" class="flex-col">
            @csrf
            <h3>login form</h3>
            <div class="group flex-col">
                <input type="text" name="username" id="username" placeholder="username" value="{{old('username')}}">
                @error('username')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="password" name="password" id="password" placeholder="password">
                @error('password')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="login">
        </form>
    </section>
@endsection