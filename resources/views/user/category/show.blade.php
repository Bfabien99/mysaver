@extends('layout')
@section('main')
    <section>
        <div class="flex text-lg font-semibold text-slate-900 gap-10 items-center">
            <h3>Information about category</h3>
            <a href="{{ route('create-category') }}"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">add
                new</a>
        </div>
        <div
            class="mt-5 max-w-100 overflow-x-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex gap-5">
                <form action="{{ route('delete-category', $category->slug) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button
                        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
                </form>
                <a href="{{ route('edit-category', $category->slug) }}"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>
            </div>
            <div class="my-5">
                <h4 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $category->title }}</h4>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ $category->description }}</p>
            </div>
        </div>

        {{-- afficher les comptes liés à la categorie --}}
        @if (!empty($category->accounts->toArray()))
            <div class="mt-5 max-w-100 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700">
                <h4 class="font-bold my-1 text-lg">Linked Accounts</h4>
                <div class="flex gap-5 ">
                    @foreach ($category->accounts as $acc)
                        <a href="{{ route('show-account', $acc['id']) }}"
                            class="border border-gray-200 rounded-lg flex-1 p-5 hover:bg-gray-100">{{ $acc->name }}</a>
                    @endforeach
                </div>

            </div>
        @endif

        {{-- afficher les sites liés à la categorie --}}
        @if (!empty($category->sites->toArray()))
            <div class="mt-5 max-w-100 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700">
                <h4 class="font-bold my-1 text-lg">Linked sites</h4>
                <div class="flex gap-5 ">
                    @foreach ($category->sites as $site)
                        <a href="{{ route('show-site', $site['slug']) }}"
                            class="border border-gray-200 rounded-lg flex-1 p-5 hover:bg-gray-100">{{ $site->title }}</a>
                    @endforeach
                </div>

            </div>
        @endif

        {{-- afficher les notes liées à la categorie --}}
        @if (!empty($category->notes->toArray()))
            <div class="mt-5 max-w-100 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:border-gray-700">
                <h4 class="font-bold my-1 text-lg">Linked notes</h4>
                <div class="flex gap-5 ">
                    @foreach ($category->notes as $note)
                        <a href="{{ route('show-note', $note['slug']) }}"
                            class="border border-gray-200 rounded-lg flex-1 p-5 hover:bg-gray-100">{{ $note->title }}</a>
                    @endforeach
                </div>

            </div>
        @endif

    </section>
@endsection
