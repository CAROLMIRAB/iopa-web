<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Office extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'photo',
        'map',
        'phone',
        'address',
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

    public function office_doctor()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_office');
    }

    public function office_surgery()
    {
        return $this->belongsToMany(Surgery::class, 'surgery_office');
    }

    public function office_exam()
    {
        return $this->belongsToMany(Exam::class, 'exam_office');
    }
}
