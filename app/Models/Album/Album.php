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
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('poster')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('cover image')
                    ->width(300)
                    ->height(300)
                    ->nonQueued();
            });
    }
}
