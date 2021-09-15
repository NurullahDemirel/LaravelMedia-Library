@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex justify-between m-2 p-2 shadow-md rounded-lg">
        <div class="m-2 p-2">
            <img src="{{$image->getUrl()}}" alt="">
        </div>
        <div class="m-2 p-2">
            <ul>
                <li>Collection name: {{$image->collection_name}}</li>
                <li>Name: {{$image->name}}</li>
                <li>Mime Type: {{$image->mime_type}}</li>
                <li>Size: {{$image->human_readable_size}}</li>
            </ul>
        </div>
    </div>


@endsection
