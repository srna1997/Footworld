<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    $post = Post::find($id);
        return view('posts.comment')->with('post',$post);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required',
        ]);
        
        $comment = new Comment;
        $comment->content = $request->get('content');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        //return back()->with('success','Comment Created');
        return redirect('/posts')->with('success','Comment Created');
        
    }

    public function destroy($id)
    {   
        $comment = Comment::find($id); 
        Comment::where('id',$id)->delete();
        
        return back()->with('success','Comment deleted');
      
    }
}
