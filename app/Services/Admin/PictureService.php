<?php

namespace App\Services\Admin;

use App\Models\Picture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PictureService
{
    public static function store(array $data)
    {
        unset($data['image']);

        $data['profile_id'] = auth()->user()->profile->id;
        $tags = $data['tags'];
        unset($data['tags']);

        $picture = Picture::create($data);
        $picture->tags()->sync($tags);
    }

    public static function update(array $data, Picture $picture)
    {
        if (!empty($data['image'])) {
            unset($data['image']);
            if (!Str::startsWith($picture->url, 'https://')) {
                Storage::disk('public')->delete($picture->url);
            }
        }

        $tags = $data['tags'];
        unset($data['tags']);
        unset($data['_method']);

        $picture->update($data);
        $picture->tags()->sync($tags);
    }

    public static function delete(Picture $picture)
    {
        if (!Str::startsWith($picture->url, 'https://')) {
            Storage::disk('public')->delete($picture->url);
        }
        $picture->delete();
    }
}
