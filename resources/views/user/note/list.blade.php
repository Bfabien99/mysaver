@extends('layout')
@section('main')
    <section class="p-5">
        <div class="flex text-lg font-semibold text-slate-900 gap-10 items-center">
            <h3>notes</h3>
            <a href="{{ route('create-note') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">add new</a>
        </div>
        @empty($notes->toArray())
            <small class="text-sm text-slate-500">No note added</small>
        @else
            <div class="flex flex-wrap mt-5 gap-5">
                @foreach ($notes as $note)
                    <a class="p-3 border border-slate-500 text-slate-900 hover:bg-gray-200" href="{{ route('show-note', $note['slug']) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Str::limit($note['title'], 50) }}</h5>
                        <small class="text-sm text-slate-500 font-bold">{{ Str::limit($note['url'], 50) }}</small>
                    </a>
                @endforeach
            </div>
        @endempty
    </section>
@endsection
