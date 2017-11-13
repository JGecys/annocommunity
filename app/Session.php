<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = ['id', 'code', 'user_id', 'expires', 'session'];

    public $timestamps = false;
}
