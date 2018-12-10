<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'body'
    ]; 

    public function offices()
    {
        return $this->belongsToMany(Office::class);
    }
}
