<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Serializers\CourseSerializer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return CourseSerializer::transformCollection(Course::all());
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create(Request $request)
//    {
//        $title = $request->input('til');
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): array
    {
        $course = new Course();
        $course->fill($request->all());
        $course->save();
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Course::find($id)->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): string
    {
        $course = Course::find($id);
        $course->fill($request->all());
        return $course->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): string
    {
        $course = Course::find($id)->first();
        $course->is_approved = false;
        $course->save();
        return 'Success';
    }
}
