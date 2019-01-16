<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Surgery extends Model
{

    use Sluggable;
    
    protected $fillable = [
        'name',
        'body',
        'slug', 
        'file',
        'status'
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

    public function offices()
    {
        return $this->belongsToMany(Office::class, 'surgery_office');
    }
    
}
