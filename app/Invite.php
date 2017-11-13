<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = 'invites';

    protected $fillable = ['id', 'code', 'community_id', 'expires_at'];

    public $timestamps = false;
}
