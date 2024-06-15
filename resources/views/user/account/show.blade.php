@extends('layout')
@section('main')
    <section>
        <div class="top flex">
            <h3>Information about account</h3>
            <a href="{{ route('create-account') }}">add new</a>
        </div>
        <div class="show flex-col">
            <div class="action flex">
                <form action="{{ route('delete-account', $account->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn-del">Delete</button>
                </form>
                <a href="{{ route('edit-account', $account->id) }}" class="btn-edit">Edit</a>
            </div>
            <img src="{{ $account->image_url }}" alt="">
            <h4>{{ $account->category?->title }}</h4>
            <h4>{{ $account->name }}</h4>
            <p>{{ $account->url }}</p>
            <p>{{ $account->more }}</p>
            <p>{{ $account->description }}</p>
            <p>{{ $account->username }}</p>
            <p>{{ $account->email }}</p>
            <p>{{ $account->phone }}</p>
            <p>{{ $account->password }}</p>
        </div>
    </section>
@endsection
