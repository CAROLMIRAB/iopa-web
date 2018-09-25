<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name', 
        'phone', 
        'excerpt', 
        'specialty_id'
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
