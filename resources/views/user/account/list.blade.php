@extends('layout')
@section('main')
    <section>
        <div class="top flex">
            <h3>Accounts</h3>
            <a href="{{route('create-account')}}">add new</a>
        </div>
        @empty($accounts)
            <small class="none">Not account added</small>
        @else
        <div class="content flex">
            @foreach ($accounts as $account)
                <a class="box flex-col" href="{{route('show-account', $account['id'])}}">
                    <img src="{{$account['image_url']}}" alt="">
                    <h3>{{ $account['name'] }}</h3>
                </a>
            @endforeach
        </div>
            @endempty
    </section>
@endsection