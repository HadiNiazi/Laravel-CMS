<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Comment extends Model
{

    protected $fillable = [
        'post_id',
        'author',
        'body',
        'email',
        'is_active',
        'photo_id'
    ];

    public function commentReply(){
        return $this->hasMany('App\CommentReply');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function user(){
        return $this->belongsTo(App\User);
    }
}
