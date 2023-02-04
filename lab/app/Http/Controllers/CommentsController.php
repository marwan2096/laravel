<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


    class CommentsController extends Controller
    {
        public function store(Request $request ,$id)
        {
            // return 'insert in database';
            // $post_id = 7 ;
            // $data = $request->all();
            // $comment = $data['comment'];
            // Comment::create([
    
            //     'comment_body' => $comment,
            //     'post_id' => $post_id
            // ]);
    
            $comment = new Comment();
            $comment->comment_body = $request->comment;
            $comment->post_id =$id ;
            $comment->save();
            // return "insert" ;
                  return redirect()->back() ;
    
        


            }
        
}

