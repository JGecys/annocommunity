<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ['id', 'comment'];

    public function user () {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function replies() {
        return $this->hasMany('App\Comment', 'reply_to', 'id');
    }

    public function parent() {
        return $this->belongsTo('App\Comment', 'reply_to', 'id');
    }
}
