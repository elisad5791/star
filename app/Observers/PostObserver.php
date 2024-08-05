<?php

namespace App\Observers;

use App\Events\LogFinishEvent;
use App\Events\LogStartEvent;
use App\Models\Log;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $data = $post->getAttributes();

        LogStartEvent::dispatch();
        Log::create(['event' => 'Post created', 'new_fields' => $data]);
        LogFinishEvent::dispatch();
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $newData = $post->getDirty();
        $newData['id'] = $post->id;

        $keys = array_keys($newData);
        $oldData = $post->getOriginal();
        $oldData = array_filter($oldData, fn($key) => in_array($key, $keys), ARRAY_FILTER_USE_KEY);
        $oldData['id'] = $post->id;

        LogStartEvent::dispatch();
        Log::create(['event' => 'Post updated', 'new_fields' => $newData, 'old_fields' => $oldData]);
        LogFinishEvent::dispatch();
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        $data = $post->getAttributes();

        LogStartEvent::dispatch();
        Log::create(['event' => 'Post deleted', 'old_fields' => $data]);
        LogFinishEvent::dispatch();
    }

    /**
     * Handle the Post "restored" event.
     */
    public function retrieved(Post $post): void
    {
        $data = ['id' => $post->id];

        LogStartEvent::dispatch();
        Log::create(['event' => 'Post retrieved', 'old_fields' => $data, 'new_fields' => $data]);
        LogFinishEvent::dispatch();
    }
}
