<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','type','content'
    ];

    public $timestamps = true;

    public function author(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function postType(){
        return $this->hasOne('App\PostType', 'id', 'type');
    }
}