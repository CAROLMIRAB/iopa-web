<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'name'
    ];  

  /*
    Relation with specialty
     */
    public function specialty_doctor()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specialty');
    }
}
