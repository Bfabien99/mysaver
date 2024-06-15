@extends('layout')
@section('main')
    <section>
        @if(session('error'))
            <p class="error">{{session('error')}}</p>
        @endif
        <form action="{{route('create-post-category')}}" method="post" class="flex-col">
            @csrf
            <h3>create category</h3>
            <div class="group flex-col">
                <input type="text" name="title" id="title" placeholder="title" value="{{old('title')}}">
                @error('title')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="group flex-col">
                <textarea name="description" id="description" placeholder="description">{{old('description')}}</textarea>
                @error('description')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="save">
        </form>
    </section>
@endsection