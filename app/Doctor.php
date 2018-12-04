<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name', 
        'lastname', 
        'phone', 
        'excerpt', 
        'specialty_id',
        'file'
       
    ]; 

    public function specialty()
    {
        return $this->belongTo(Specialty::class);
    }

    public function offices()
    {
        return $this->belongsToMany(Office::class);
    }
}
