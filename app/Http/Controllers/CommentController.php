<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): string
    {
        return Comment::all()->toJson(JSON_PRETTY_PRINT);
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
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->save();
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Comment::find($id)->toJson(JSON_PRETTY_PRINT);
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
        $comment = Comment::find($id);
        $comment->fill($request->all());
        return $comment->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): string
    {
        $comment = Comment::find($id)->first();
        $comment->is_approved = false;
        $comment->save();
        return 'Success';
    }

    public function getCommentsByCourseId($id): string
    {
        return Comment::query()->where('course_id', $id)->orderByDesc('id')->get()->toJson(JSON_PRETTY_PRINT);
    }
}
