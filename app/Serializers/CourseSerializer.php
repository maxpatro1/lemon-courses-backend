<?php

namespace App\Serializers;

use App\Models\Course;

class CourseSerializer
{
    static function transform(Course $item): array
    {
        return [
            'id' => $item->id,
            'title' => $item->title,
            'description' => $item->description,
            'photo_url' => $item->photo_url,
            'url' => $item->url,
            'average_grade' => $item->average_grade,
            'grades_quantity' => $item->grades_quantity,
            'comments_quantity' => $item->comments_quantity
        ];
    }

    static function transformCollection($items): array
    {
        $result = [];
        foreach ($items as $item)
        {
            $result[] = self::transform($item);
        }
        return $result;
    }
}
