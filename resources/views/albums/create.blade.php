@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('albums.store') }}">
        @csrf
        <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
            <div class="mt-1">
                <input type="text" id="title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
        </div>
        <div class="sm:col-span-6 pt-5">
            <x-button class="bg-green-600">Create</x-button>
        </div>
    </form>

@endsection
