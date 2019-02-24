<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Specialty extends Model
{

    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'body'
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

  /*
    Relation with specialty
     */
    public function specialty_doctor()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specialty');
    }
}
