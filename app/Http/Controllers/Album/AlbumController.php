<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Models\Album\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums=Album::all();
        return view('albums.index' ,compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Album::create([
           'title'=>$request->title
        ]);
        return redirect()->route('albums.index')->with('success','Post was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $photos=$album->getMedia();
        return view('albums.show',compact('album','photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {

        $album->update($request->all());
        return back()->with('success','Post was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {

        $album->delete();
        return redirect()->route('albums.index')->with('delete','Post was deleted successfully');
    }

    public function upload(Album $album,Request $request)
    {
        if ($request->has('cover_image')){
            $album->addMedia($request->cover_image)->toMediaCollection('poster');
        }
        if ($request->has('image')){
            $album->addMedia($request->image)->toMediaCollection('gallery');
        }
        return redirect()->back()->with('success','Post was updated successfully');
    }

    public function showImage(Album $album,$id)
    {
        $media=$album->getMedia();
        $image=$media->where('id',$id)->first();
        return view('albums.show-image',compact('image'));
    }

    public function deleteImageFromAlbum(Album $album,$id)
    {
        $items=$album->getMedia();
        $items->where('id',$id)->first()->delete();
        return back()->with('success','Image was deleted successfully');
    }
}
