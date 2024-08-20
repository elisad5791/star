<?php

namespace App\Services\Admin;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoService
{
    public static function store(array $data)
    {
        unset($data['images']);

        $data['profile_id'] = auth()->user()->profile->id;
        if (!empty($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $video = Video::create($data);
        if (!empty($tags)) {
            $video->tags()->sync($tags);
        }
    }

    public static function update(array $data, Video $video)
    {
        if (!empty($data['images'])) {
            unset($data['images']);
            foreach ($video->url as $url) {
                if (!Str::startsWith($url, 'https://')) {
                    Storage::disk('public')->delete($url);
                }
            }
        }

        if (!empty($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        } else {
            $tags = [];
        }

        unset($data['_method']);

        $video->update($data);
        $video->tags()->sync($tags);
    }

    public static function delete(Video $video)
    {
        foreach ($video->url as $url) {
            if (!Str::startsWith($url, 'https://')) {
                Storage::disk('public')->delete($url);
            }
        }
        $video->delete();
    }
}
