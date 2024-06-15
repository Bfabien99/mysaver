@extends('layout')
@section('main')
    <section>
        @if(session('error'))
            <p class="error">{{session('error')}}</p>
        @endif
        <form action="{{route('create-post-account')}}" method="post" class="flex-col">
            @csrf
            <h3>add account</h3>
            <hr>
            <h4>account information</h4>
            <div class="group flex-col">
                <input type="text" name="name" id="name" placeholder="name" value="{{old('name')}}">
                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="url" id="url" placeholder="url" value="{{old('url')}}">
                @error('url')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="image_url" id="image_url" placeholder="image_url" value="{{old('image_url')}}">
                @error('image_url')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <textarea name="more" id="more" placeholder="more">{{old('more')}}</textarea>
                @error('more')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <textarea name="description" id="description" placeholder="description">{{old('description')}}</textarea>
                @error('description')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <select name="cat_id" id="">
                    <option value="">Choose category</option>
                    @foreach ($categories as $cat)
                    @if (old('cat_id') == $cat['id'])
                    <option value="{{$cat['id']}}" selected>{{$cat['title']}}</option>
                    @else
                    <option value="{{$cat['id']}}">{{$cat['title']}}</option>
                    @endif
                    @endforeach
                </select>
                @error('cat_id')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <hr>
            <h4>user information</h4>
            <div class="group flex-col">
                <input type="text" name="username" id="username" placeholder="username" value="{{old('username')}}">
                @error('username')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="email" id="email" placeholder="email" value="{{old('email')}}">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="phone" id="phone" placeholder="phone" value="{{old('phone')}}">
                @error('phone')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="password" id="password" placeholder="password" value="{{old('password')}}">
                @error('password')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="save">
        </form>
    </section>
@endsection