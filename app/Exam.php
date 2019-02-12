<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Exam extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug','description', 'preparation', 'indications', 'file', 'status']; 

  
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

    public function exam_office()
    {
        return $this->belongsToMany(Office::class, 'exam_office');
    }

}

