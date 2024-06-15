@extends('layout')
@section('main')
    <section>
        @if(session('error'))
            <p class="error">{{session('error')}}</p>
        @endif
        <form action="{{route('edit-post-account', $account['id'])}}" method="post" class="flex-col">
            @csrf
            <h3>edit account</h3>
            <hr>
            <h4>account information</h4>
            <img src="{{$account['image_url']}}">
            <div class="group flex-col">
                <input type="text" name="name" id="name" placeholder="name" value="{{old('name') ?? $account['name']}}">
                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="url" id="url" placeholder="url" value="{{old('url') ?? $account['url']}}">
                @error('url')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="image_url" id="image_url" placeholder="image_url" value="{{old('image_url') ?? $account['image_url']}}">
                @error('image_url')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <textarea name="more" id="more" placeholder="more">{{old('more') ?? $account['more']}}</textarea>
                @error('more')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <textarea name="description" id="description" placeholder="description">{{old('description') ?? $account['description']}}</textarea>
                @error('description')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <select name="cat_id" id="">
                    <option value="">Choose category</option>
                    @foreach ($categories as $cat)
                        @if ($account['cat_id'] == $cat['id'])
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
                <input type="text" name="username" id="username" placeholder="username" value="{{old('username') ?? $account['username']}}">
                @error('username')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="email" id="email" placeholder="email" value="{{old('email') ?? $account['email']}}">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="phone" id="phone" placeholder="phone" value="{{old('phone') ?? $account['phone']}}">
                @error('phone')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <input type="text" name="password" id="password" placeholder="password" value="{{old('password') ?? $account['password']}}">
                @error('password')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="save">
        </form>
    </section>
@endsection