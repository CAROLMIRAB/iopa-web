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

    public function surgeries()
    {
        return $this->belongsToMany(Surgery::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }

   
}
