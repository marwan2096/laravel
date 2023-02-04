<?php

namespace App\Http\Controllers;

use App\Models\User;
use public\uploads\books;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        //select * from posts;
        $allPosts = Post::paginate(5);
        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {
       

    $title=$request->title;
    $description=$request->description;
    $user_id=$request->user_id;
    
    $img = $request->file('img');
    // dd($img);
    $ext = $img->getClientOriginalExtension();
    // dd($ext);
    $name="book-".uniqid(). ".$ext";
    // dd($name);
    $img->move(public_path('uploads/books'),$name);
   

        //store the form data inside the database
        Post::create([
            'title' =>$title,
            'description' => $description,
            'user_id' => $user_id,
            'img' =>$name,
           
             
            // 'user_id' => $userId,
        ]);
        
        return to_route('posts.index');
    }

    public function show($postId)
    {

        $users = user::get();
        $post = Post::find($postId);
        $allComments = Comment::get();
        
        return view("posts.show", ['post' => $post,'users' => $users,
    
        'posts'=> $post,
        'users' => $users,
        'comments' => $allComments,
         'id' => $postId
    
    ]);
    }

    public function edit(Post $post){

        $users = User::all();

        return view('posts.edit',['post' => $post,
            'users' => $users,
            
            
        ]);


        // return view("posts.edit", ['post' => $post]);



    }
    public function update($id ,UpdatePostRequest $request){

        $post = Post::find($id );
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,

        ]);

        return to_route('posts.index');

        if($request->hasFile('img')){

            $img = $request->file('img');
            // dd($img);
            $ext = $img->getClientOriginalExtension();
            // dd($ext);
            $name="book-".uniqid(). ".$ext";
            // dd($name);
            $img->move(public_path('uploads/books'),$name);
        

        
        };

}


public function destroy($id ){

    $post = Post::find($id );
    if($post->img !== null){
    unlink(public_path('uploads/books/').$post->img);
    }
    $post->delete();
       
return to_route('posts.index');
}




};