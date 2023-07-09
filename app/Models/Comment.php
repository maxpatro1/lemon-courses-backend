<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'text',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
