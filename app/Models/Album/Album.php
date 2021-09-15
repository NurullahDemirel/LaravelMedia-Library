<?php

namespace App\Models\Album;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Album extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded=[];
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->performOnCollections('poster');

        $this->addMediaConversion('gallery')
            ->width(400)
            ->height(400)
            ->performOnCollections('gallery');

    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('poster');

        $this->addMediaCollection('gallery');

    }


}
