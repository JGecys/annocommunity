<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['id', 'title', 'content', 'community'];

    public function user () {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function community() {
        return $this->belongsTo('App\Community', 'community');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function commentCount(){
        return $this->hasOne('App\Comment', 'post_id', 'id')->selectRaw('post_id, count(*) as count')->groupBy('post_id');
        // replace module_id with appropriate foreign key if needed
    }

}
