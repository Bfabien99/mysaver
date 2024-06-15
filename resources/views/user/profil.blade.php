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
        <form action="{{route('edit-credentials')}}" method="post" class="max-w-sm mx-auto border border-slate-300 p-6">
            @csrf
            <h3 class="text-md capitalize font-bold my-2">edit information</h3>
            <div class="mb-5">
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700" type="text" name="username" id="username" placeholder="username" value="{{old('username') ?? auth()->user()->username}}">
                @error('username')
                    <p class="mt-2 text-sm text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700" type="email" name="email" id="email" placeholder="email" value="{{old('email') ?? auth()->user()->email}}">
                @error('email')
                    <p class="mt-2 text-sm text-red-500">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Edit information" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
        <form action="{{route('edit-password')}}" method="post" class="max-w-sm mx-auto my-5 border border-slate-300 p-6">
            @csrf
            <h3 class="text-md capitalize font-bold my-2">edit password</h3>
            <div class="mb-5">
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700" type="text" name="password" id="password" placeholder="password">
                @error('password')
                    <p class="mt-2 text-sm text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700" type="password_confirmation" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-500">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Edit password" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
    </section>
@endsection