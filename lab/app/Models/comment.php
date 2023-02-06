<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_body',
        'user_id	',
        'post_id',
         'img',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }




}



