<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'name'
    ];  

  /*
    Relation with category
     */
    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
