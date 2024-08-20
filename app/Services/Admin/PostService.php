<?php

namespace App\Services\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class PostService
{
    public static function store(array $data)
    {
        try {
            DB::beginTransaction();
            $data['article']['slug'] = Str::slug($data['article']['title']);
            $post = auth()->user()->profile->posts()->create($data['article']);

            $tagIds = TagService::storeBatch($data['tags']);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public static function update(array $data, Post $post)
    {
        try {
            DB::beginTransaction();
            $data['article']['slug'] = Str::slug($data['article']['title']);
            $post->update($data['article']);

            $tagIds = TagService::storeBatch($data['tags']);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
