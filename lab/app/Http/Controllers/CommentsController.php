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
          
            $comment = new comment();
            $comment->comment_body = $request->comment;
            $comment->post_id =$id ;
            $comment->save();
           
                  return redirect()->back() ;
    
    
            }
        

            public function destroy($id)
    {
        $comment = comment::find($id);
  
        $comment->delete();
        return redirect()->back() ;
    }
}

