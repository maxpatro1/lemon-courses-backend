<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property boolean $is_approved
 * @property string $photo_url
 * @property string $url
 * @property string $created_at
 * @property string $updated_at
 */

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_approved',
        'photo_url',
        'url'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function getAverageGradeAttribute()
    {
        return $this->grades()->avg('grade');
    }

    public function getGradesQuantityAttribute(): int
    {
        return $this->grades()->count();
    }

    public function getCommentsQuantityAttribute(): int
    {
        return $this->comments()->count();
    }
}
