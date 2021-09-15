@extends('layouts.app')

@section('content')
    @include('include.index')
    <form method="POST" action="{{ route('albums.update',$album->id) }}">
        @csrf
        @method('PUT')
        <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
            <div class="mt-1">
                <input value="{{old('title',$album->title)}}" type="text" id="title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
            </div>
        </div>
        <div class="sm:col-span-6 pt-5">
            <x-button class="bg-green-600">Update</x-button>
        </div>
    </form>

@endsection
