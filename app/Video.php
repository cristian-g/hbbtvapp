<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'director', 'views', 'description', 'cast', 'minutes', 'source', 'thumbnail'
    ];

    /**
     * The connected users.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
