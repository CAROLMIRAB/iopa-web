<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['user_id', 'category_id', 'name','slug','excerpt','body','status','file'];    
    
  

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

     /*
    Relation with tags
     */
   /* public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }*/
}
