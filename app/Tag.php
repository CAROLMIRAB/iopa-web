<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name','slug']; 
    
   /*
    Relation with post
   */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
