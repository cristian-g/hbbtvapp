<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The videos the user is connected to.
     */
    public function videos()
    {
        return $this->belongsToMany('App\Video');
    }
}
