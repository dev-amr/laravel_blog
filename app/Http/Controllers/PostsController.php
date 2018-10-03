<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index() 
    {
        //refactored using query scopes in post.php
        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->paginate(5);
        
        //temporary
    $archives = Post::archives();

    return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        //$post = Post::find($id);
        //return $post;
    
    return view('posts.show', compact('post'));
    }
    

    public function create() 
    {
        
    return view('posts.create');
    }


    public function store()
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle file upload
        if(request()->hasFile('cover_image')){
            //get filename with extention
        $filenameWithExt = request()->file('cover_image')->getClientOriginalname();
        //get filename only
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get extention only
        $extension = request()->file('cover_image')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //upload image
        $path = request()->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        //fix the filename to the field name
        }else{
            $fileNameToStore = null;
        }

        //auth()->user()->publish(new Post(request(['title', 'body'])));

        //create the post
      $post = Post::create([
        'title' => request('title'),
        'body' => request('body'),
        'cover_image'=>$fileNameToStore,
        'user_id'=> auth()->id()
      ]);
      

        session()->flash('message', 'Your post has been published.');

        return redirect('/');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        //check if the user is the correct owner of the post
        $current_user_id = intval(auth()->user()->id);
        $post_owner_id = intval($post->user_id);
        if($current_user_id !== $post_owner_id)
        {
            return redirect('/')->with('error', 'unauthorised page!');
        }
        return view('posts.edit')->with('post', $post);
    }

    public function update($id)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
          ]);

          //handle file upload
        if(request()->hasFile('cover_image')){
            //get filename with extention
        $filenameWithExt = request()->file('cover_image')->getClientOriginalname();
        //get filename only
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get extention only
        $extension = request()->file('cover_image')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //upload image
        $path = request()->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        //fix the filename to the field name
        }

    
          $post = Post::find($id);
          $post->title = request('title');
          $post->body = request('body');
          if(request()->hasFile('cover_image')){
                //delete Old image
                Storage::delete('public/cover_images/'.$post->cover_image);
                //store new one
                $post->cover_image = $fileNameToStore;
          }
          $post->save();
          session()->flash('message', 'Post updated!');
          return redirect('/');
    }

    public function destroy($id)
    {
      //echo "delete data!!";
      $post = Post::find($id);
      //check if the user is the correct owner of the post
        $current_user_id = intval(auth()->user()->id);
        $post_owner_id = intval($post->user_id);
        if($current_user_id !== $post_owner_id)
      {
          return redirect('/')->with('error', 'unauthorised page!');
      }
      if($post->cover_image != null){
        //delete image
        Storage::delete('public/cover_images/'.$post->cover_image);
      }
      $post->delete();
      session()->flash('message', 'Post Removed!');
      return redirect('/');
    }

    public function getposts()
    {
      //get the user's posts
      $posts = auth()->user()->posts()->get();
      //redirect to the userposts page
      return view('posts.dashboard', compact('posts'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $posts = Post::where('title', 'LIKE','%'.$keyword.'%')->paginate(5);;
        return view('posts.search', compact('posts'));
    }

    
}
