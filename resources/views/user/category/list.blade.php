@extends('layout')
@section('main')
    <section>
        <div class="top flex">
            <h3>Categories</h3>
            <a href="{{ route('create-category') }}">add new</a>
        </div>
        @empty($categories)
            <small class="none">Not category added</small>
        @else
            <div class="content flex">
                @foreach ($categories as $cat)
                    <a class="box flex" href="{{ route('show-category', $cat['slug']) }}">
                        <h3>{{ $cat['title'] }}</h3>
                        <small>{{ count($cat['accounts']) }}</small>
                    </a>
                @endforeach
            </div>
        @endempty
    </section>
@endsection
