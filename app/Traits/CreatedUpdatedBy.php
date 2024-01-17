<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->check('sanctum') ? auth()->user()->id : null;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->check('sanctum') ? auth()->user()->id : null;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth('sanctum')->check() ? auth()->user()->id : null;
            }
        });

        // updating created_by and updated_by via save()
        static::saving(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth('sanctum')->check() ? ($model->created_by ?? auth('sanctum')->user()->id) : null;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth('sanctum')->check() ? auth('sanctum')->user()->id : null;
            }
        });
    }
}
