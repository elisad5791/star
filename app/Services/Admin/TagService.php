<?php

namespace App\Services\Admin;

use App\Models\Tag;

class TagService
{
    public static function storeBatch($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['title' => $tag['title']], ['title' => $tag['title']]);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
}
