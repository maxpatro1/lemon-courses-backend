<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): string
    {
        return Grade::all()->toJson(JSON_PRETTY_PRINT);
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
        $grade = new Grade();
        $grade->fill($request->all());
        $grade->save();
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Grade::find($id)->toJson(JSON_PRETTY_PRINT);
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
        $grade = Grade::find($id);
        $grade->fill($request->all());
        return $grade->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): string
    {
        $grade = Grade::find($id)->first();
        $grade->is_approved = false;
        $grade->save();
        return 'Success';
    }
}
