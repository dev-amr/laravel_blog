<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        if(\Auth::check())
      {
        $user_id= auth()->user()->id;
        $this->validate(request(), ['body' => 'required|min:2']);
        $post->addComment(request('body'),$user_id);
        session()->flash('message', 'Thanks for your comment.');
        return back();
      }else{
        return back()->withErrors([
          'message'=>'You need to login to comment on posts!'
        ]);
      };
    }
}
