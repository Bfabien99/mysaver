@extends('layout')
@section('main')
    <section>
        <h4 class="text-2xl font-bold">Hello <span class="text-3xl text-red-400">{{auth()->user()->username}}</span></h4>
        <div class="flex flex-wrap mt-5 gap-5">
                <a class="flex gap-4 p-3 border border-slate-500 text-slate-900 hover:bg-gray-200 flex-1" href="{{ route('category') }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Category</h5>
                    <small class="text-red-500 text-lg">{{count($categories->toArray())}}</small>
                </a>
                <a class="flex gap-4 p-3 border border-slate-500 text-slate-900 hover:bg-gray-200 flex-1" href="{{ route('account') }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Accounts</h5>
                    <small class="text-red-500 text-lg">{{count($accounts->toArray())}}</small>
                </a>
        </div>
    </section>
@endsection