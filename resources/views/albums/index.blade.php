@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        @include('include.index')
        <div class="w-full p-2 pl-4 mx-auto">
            <a href="{{route('albums.create')}}" class="bg-green-600 text-white font-semibold rounded-lg p-2">Create</a>
        </div>
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3 uppercase">ID</th>
                            <th class="px-4 py-3 uppercase">title</th>
                            <th class="px-4 py-3 uppercase">manage</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($albums as $album)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 text-ms font-semibold border">{{$album->id}}</td>
                                    <td class="px-4 py-3 text-xs border">
                                        <a href="{{route('albums.show',$album->id)}}" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{$album->title}} </a>
                                    </td>
                                    <td class="px-4 py-3 border">
                                        <div class="flex space-x-2 items-center">
                                            <a class="p-2 bg-green-300" href="{{route('albums.edit',$album->id)}}">Edit</a>
                                            <form action="{{route('albums.destroy',$album->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="p-2 bg-red-300" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-2 p-2">
                        Pagination
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
