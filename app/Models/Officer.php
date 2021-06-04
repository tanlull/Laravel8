<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    protected $table = 'officers';

    // Add getter to json data
    protected $appends = ['fullname', 'age', 'picture_url'];

    //getter (Accessor)
    public function getfullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getAgeAttribute()
    {
        return now()->diffInYears($this->dob);
    }

    public function getPictureUrlAttribute() // picture_url
    {
        //  return  $this->picture;
        return asset('storage/upload') . '/' . $this->picture;
    }

    //many to one relationship
    public function department()
    {
        return $this->belongsTo(department::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
