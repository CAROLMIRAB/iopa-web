<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $fillable = ['name', 'description', 'image', 'content','slug']; 
   
}
