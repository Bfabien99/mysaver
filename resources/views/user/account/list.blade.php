@extends('layout')
@section('main')
    <section class="p-5">
        <div class="flex text-lg font-semibold text-slate-900 gap-10 items-center">
            <h3>Accounts</h3>
            <a href="{{route('create-account')}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">add new</a>
        </div>
        @empty($accounts->toArray())
            <small class="text-sm text-slate-500">No account added</small>
        @else
        <div class="flex flex-wrap mt-5 gap-5">
            @foreach ($accounts as $account)
                <a class="block max-w-xs p-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100" href="{{route('show-account', $account['id'])}}">
                    <img src="{{$account['image_url']}}" class="w-full h-96 my-2">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $account['name'] }}</h5>
                </a>
            @endforeach
        </div>
            @endempty
    </section>
@endsection