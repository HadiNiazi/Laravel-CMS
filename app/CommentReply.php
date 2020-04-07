<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

    protected $fillable = [
        'comment_id',
        'author',
        'body',
        'email',
        'photo_id',
        'is_active',
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
