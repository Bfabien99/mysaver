@extends('layout')
@section('main')
    <section>
        @if(session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error!</span> {{session('error')}}
          </div>
        @endif
        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{session('success')}}
          </div>
        @endif
        <form action="{{route('create-post-category')}}" method="post" class="max-w-sm mx-auto">
            @csrf
            <h3 class="text-sm capitalize font-bold my-2">create category</h3>
            <div class="mb-5">
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700" type="text" name="title" id="title" placeholder="title" value="{{old('title')}}">
                @error('title')
                    <p class="mt-2 text-sm text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700" name="description" id="description" placeholder="description">{{old('description')}}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-500">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="save" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
    </section>
@endsection