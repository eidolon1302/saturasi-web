<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $fillable = [
        'title', 'message', 'status', 'status_msg', 'created_by', 'updated_by'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
