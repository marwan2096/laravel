<?php

namespace App\Http\Controllers;

use App\Models\User;
use public\uploads\books;
use Illuminate\Http\Request;
use App\Models\Post;
use Termwind\Components\Dd;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\CommentsController;

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
       
 //get me the form submission data
//        $data = request()->all();
//
//        $title = $data['title'];
//        $description = $data['description'];
//

//        $title = request()->title;
//        $description = request()->description;

    //    $request->validate([
    //        'title' => ['required', 'min:3'],
    //        'description' => ['required', 'min:5'],
    //    ],
//            'title.required' => 'this message is changed',
//            'title.min' => 'minimum override message',
    //    );
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
//        $allJavascriptPosts = Post::where('title', 'Javascript')->get();
//        dd($allJavascriptPosts);

//        $result = Post::where('id', $postId)->get(); //return Collection object
//        dd($result);
//        $post = Post::where('id', $postId)->first(); //return App\Models\Post object
        $users = user::get();
        $post = Post::find($postId);
      
        
       
        return view("posts.show", ['post' => $post,'users' => $users,]);
    }

    public function edit(Post $post){

        $users = User::all();

        return view('posts.edit',['post' => $post,
            'users' => $users,
            
            
        ]);


        // return view("posts.edit", ['post' => $post]);



    }
    public function update($postId,UpdatePostRequest $request){

        $post = Post::find($postId);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,

        ]);

        return to_route('posts.index');

}


public function destroy($postId){

//  single query  Post::where("id",$postId)->delete();
    $post = Post::find($postId);
    $post->delete();
       
return to_route('posts.index');
}


}


