<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['name', 'slug','body']; 

  
    public function Office()
    {
        return $this->belongsToMany(Office::class);
    }

}

