<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Community
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 * @package App
 */
class Community extends Model
{
    protected $table = 'communities';

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    public function posts(){
        return $this->hasMany('App\Post', 'community');
    }

}
