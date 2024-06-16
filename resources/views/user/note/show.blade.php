@extends('layout')
@section('main')
    <section>
        <div class="flex text-lg font-semibold text-slate-900 gap-10 items-center">
            <h3>Information about note</h3>
            <a href="{{ route('create-note') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">add new</a>
        </div>
        <div class="mt-5 max-w-100 overflow-x-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex gap-5">
                <form action="{{route('delete-note', $note->slug)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
                </form>
                <a href="{{route('edit-note', $note->slug)}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
            </div>
            <div class="my-5">
                <h4 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$note->title}}</h4>
                @empty ($note->url)
                   <small class="text-sm text-slate-500">No link</small> 
                @else
                <a target="_blank" href="{{$note->url}}" class="my-2 text-sm font-bold tracking-tight text-blue-500 hover:text-blue-700 dark:text-white">visit site</a>
                @endif
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400 text-justify">{{$note->content}}</p>
            </div>
        </div>
    </section>
@endsection