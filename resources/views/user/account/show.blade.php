@extends('layout')
@section('main')
    <section>
        <div class="flex text-lg font-semibold text-slate-900 gap-10 items-center">
            <h3>Information about account</h3>
            <a href="{{ route('create-account') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">add new</a>
        </div>
        <div class="mt-5 max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex gap-5">
                <form action="{{ route('delete-account', $account->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
                </form>
                <a href="{{ route('edit-account', $account->id) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
            </div>
            <img src="{{ $account->image_url }}" class="w-full h-96 my-2">
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Category</p>
                <h4 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->category?->title }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Name</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->name }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">url</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->url }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">more</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->more }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">description</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->description }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">username</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->username }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">email</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->email }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">phone</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->phone }}</h4>
            </div>
            <div class="flex gap-5 items-center">
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">password</p>
                <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account->password }}</h4>
            </div>
        </div>
    </section>
@endsection
