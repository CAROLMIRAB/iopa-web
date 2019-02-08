<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'user_id', 
        'category_id', 
        'name',
        'slug',
        'excerpt',
        'body',
        'status',
        'file', 
        'tags',
        'created_at'
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
    Relation with category
     */
    public function category()
    {
        return $this->belongTo(Category::class);
    }

       /*
    Relation with user
     */
    public function user()
    {
        return $this->belongTo(User::class);
    }


    
 
}
