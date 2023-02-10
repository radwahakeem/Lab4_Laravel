<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        
    //     $response =[];
    //     foreach($posts as $post){
    //         $response []=[
    //             'id' =>$post ->id,
    //             'title' =>$post ->title,
    //         ];
    //     }
    //     return $response;
    return PostResource::collection($posts);
     }

    

    public function show($postId){
        $post= Post::find($postId);
        // return [
        //     'id' =>$post ->id,
        //     'title' =>$post ->title,
        // ];
        return new PostResource($post);
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
        return $post;

    }
}
