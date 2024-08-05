<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait HasEventLogs
{
    protected static function bootHasEventLogs()
    {
        static::created(function (Model $model) {
            $data = $model->getAttributes();
            $object = last(explode('\\', __CLASS__));
            Log::channel('post')->info($object . ' created.', $data);
        });

        static::updated(function (Model $model) {
            $newData = $model->getDirty();
            $newData['id'] = $model->id;

            $keys = array_keys($newData);
            $oldData = $model->getOriginal();
            $oldData = array_filter($oldData, fn($key) => in_array($key, $keys), ARRAY_FILTER_USE_KEY);
            $oldData['id'] = $model->id;

            $object = last(explode('\\', __CLASS__));

            Log::channel('post')->info($object . ' updated.', ['new_data' => $newData, 'old_data' => $oldData]);
        });

        static::deleted(function (Model $model) {
            $object = last(explode('\\', __CLASS__));
            $message = $object . ' deleted. ID = ' . $model->id;
            Log::channel('post')->info($message);
        });

        static::retrieved(function (Model $model) {
            $data = $model->getAttributes();
            $object = last(explode('\\', __CLASS__));
            Log::channel('post')->info($object . ' retrieved.', $data);
        });
    }
}
