<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'map',
        'phone',
        'address' 
    ]; 

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
