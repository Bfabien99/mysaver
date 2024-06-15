@extends('layout')
@section('main')
    <section>
        <div class="top flex">
            <h3>Information about category</h3>
            <a href="{{ route('create-category') }}">add new</a>
        </div>
        <div class="show">
            <div class="action flex">
                <form action="{{route('delete-category', $category->slug)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn-del">Delete</button>
                </form>
                <a href="{{route('edit-category', $category->slug)}}" class="btn-edit">Edit</a>
            </div>
            <h4>{{$category->title}}</h4>
            <p>{{$category->description}}</p>
        </div>
    </section>
@endsection