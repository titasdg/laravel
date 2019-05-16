<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','image','category_id','user_id'];

    public function category()
{
    return $this->belongsTo('App\Category');
}
public function comments()
{
    return $this->hasMany('App\Comments');
}
}
