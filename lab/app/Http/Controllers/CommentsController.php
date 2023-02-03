<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function show($id)
    {
        // get the comment with the same id from the database
        $comment = Comment::find($id);

        return view("comments.show", ['comment' => $comment]);
    }

    
    public function store($postID, Request $request)
    {
        // get all data from form user submitted
        $commentData = $request->all();
        // validate if all fields are provided from form

        // get post with given id
        $post = Post::find($postID);

        // add comment to post
        $post->comments()->create(
            [
                'comment' => $commentData['comment'],
                'user_id' => Auth::id(),
            ]
        );

        // redirect to index page route
        return redirect()->route('posts.show', ['post' => $postID]);
    }



    public function edit($id)
    {

        // get post with given id
        $comment = Comment::find($id);
        return view("comments.edit", ['comment' => $comment]);
    }








}

