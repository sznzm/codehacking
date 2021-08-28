<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        $categories = Category::all();

        return view('front/home', compact('posts', 'categories'));
    }

    public function post($id){

        $post = Post::findOrFail($id);
        $categories = Category::all();


        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'comments', 'categories'));
    }

    public function storeComment(Request $request)
    {
        $user = Auth::user();
        
        $data = [
            'post_id' => $request->post_id,
            'author' => $user->name,
            'email' => $user->email,
            'photo' => $user->photo ? $user->photo->file : null,
            'body' => $request->body
        ];

        Comment::create($data);

        $request->session()->flash('comment_message', 'Your message has been submited and its waiting moderation');

        return redirect()->back();

    }

}
