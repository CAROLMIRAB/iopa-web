<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Doctor extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'name', 
        'lastname', 
        'phone', 
        'excerpt', 
        'email',
        'rut',
        'file',
        'slug'
    ]; 


      /* Return the sluggable configuration array for this model.
    *
    * @return array
    */
   public function sluggable()
   {
       return [
           'slug' => [
               'source' => 'name'
           ]
       ];
   }

   public function doctor_specialty()
   {
       return $this->belongsToMany(Specialty::class, 'doctor_specialty');
   }

    public function doctor_office()
    {
        return $this->belongsToMany(Office::class, 'doctor_office');
    }

    
}
