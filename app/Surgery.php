<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    protected $fillable = [
        'name',
        'body',
        'slug', 
        'file',
        'status'
    ]; 

    public function offices()
    {
        return $this->belongsToMany(Office::class);
    }
    
}
