<?php

namespace App\Http\Controllers;

use App\Models\User;
use public\uploads\books;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Providers\TagsServiceProvider;


class PostController extends Controller
{
    public function index()
    {
       
        //eager loading function
        // $allPosts = Post::with('user')->get();
        $allPosts = Post::paginate(5);
        return view('posts.index',[
           'posts' => $allPosts,
        ]);
    }
   
    
    
//  create new post 
    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users,
        ]);
    }



//  store post 
    public function store(StorePostRequest $request)
    {
       

    $title=$request->title;
    $description=$request->description;
    $user_id=$request->user_id;
    
  
    //   image store  and validation
    $this->validate($request, [
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $image_path = $request->file('image')->store('image', 'public');

    session()->flash('success', 'Image Upload successfully');
   
    // store
        
        Post::create([
            'title' =>$title,
            'description' => $description,
            'user_id' => $user_id,
            'image' => $image_path,
        
            
        ]);
        
        return to_route('posts.index');
    }


    //  show post 
    public function show($postId)
    {
        

        $users = user::get();
        $post = Post::find($postId);
        $allComments = comment::get();
        
        return view("posts.show", 
        ['post' => $post,
        'posts'=> $post,
        'users' => $users,
        'comments' => $allComments,
         'id' => $postId
    
    ]);
    }


    
        // edit post 
    public function edit(Post $post){

        $users = User::all();

        return view('posts.edit',['post' => $post,
            'users' => $users,
            
            
        ]);


    }
    // update post
    public function update($id ,UpdatePostRequest $request){
        $image_path = $request->file('image')->store('image', 'public');
        $post = Post::find($id );
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $image_path,
           
        ]);
        
        return to_route('posts.index');

    }
// delete post

public function destroy($id ){

    $post = Post::find($id );
    if($post->img !== null){
    unlink(public_path('uploads/books/').$post->img);
    }
    $post->delete();
       
return to_route('posts.index');
}



};