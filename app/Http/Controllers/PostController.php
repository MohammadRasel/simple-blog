<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use Carbon\Carbon; 

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }





    public function index(){
        //filter post from 
        $posts = Post::latest();

        if($month = request('month')){
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = request('year')){
            $posts->whereYear('created_at', $year);
        }
            
        $posts = $posts->get();


    	return view('posts/index', compact('posts'));
    }

    public function show(Post $post){

    	return view('posts/show', compact('post'));
    }

    public function create(){
    	
    	return view('posts/create');
    }

    public function store(){

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
    	
    	// Post::create([
     //        'user_id' => auth()->id(),
     //        'title' => request('title'),
     //        'body'  => request('body')
     //    ]);
    	//And then redirect to home page
    	return redirect('/');
    }
}
