<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(StoreCommentRequest $request): \Illuminate\Http\RedirectResponse
    {
         $data = $request->validated();
         Comment::create($data);

        return back()->with('comment-state','Create New Comment Successfully !!');
    }
}
