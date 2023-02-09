<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
 use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        
        
        $posts_DB= Post::paginate(5);
        

        return view('posts.index', [
            'posts' => $posts_DB
        ]);
    }

    public function show($postId)
    {

        $singlepost= Post::findorfail($postId);
        

        return view('posts.show', ['post' => $singlepost]);
    }

    

    public function create()
    {
        $users = User::all();
        return view('posts.create',['users' => $users] );
    }


    public function store(StorePostRequest $request)
    {

        

        
        $title = $request -> title;
        $description = $request -> description;
        $userId = $request -> user_id;
        $slug = Str::slug($request->slug);
        $post= Post:: create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
            'slug' => $slug,

        ]);
        return redirect() -> route('posts.index');

    }

    public function edit($postId)
    {
        
        $singlepost= Post::findorfail($postId);
        $users = User::all();
        

        return view('posts.edit', ['post' => $singlepost],['users' => $users]);

        
    }

    public function update(Request $request,$postId)
    {
        $singlepost= Post::findorfail($postId);
        $title = $request -> title;
        $description = $request -> description;
        $userId = $request -> user_id;
        $singlepost -> update([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId

        ]);
        

        return redirect() -> route('posts.index');

        
    }




    public function destroy($postId)
    {
        
        $singlepost= Post::findorfail($postId);
        $singlepost -> delete();
        return redirect() -> route('posts.index');

        
    }

    public function restore(){
        $posts=post::withTrashed()->restore();

        return redirect('/posts');


    }


    
}
