<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add($id)
    {
        Comment::create([
           'user_id' => auth()->user()->id,
            'blog_id' => $id,
            'comment' => request('comment')
        ]);
        return redirect()->back();
    }
}
