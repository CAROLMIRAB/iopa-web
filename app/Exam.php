<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['name', 'slug','body']; 

  
    public function offices()
    {
        return $this->belongsToMany(Office::class, 'exam_office');
    }

}

