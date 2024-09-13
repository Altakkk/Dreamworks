<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacherID');
    }
    public function student(){
        return $this->hasMany(Student::class, 'courseID');
    }
    public function attendances(){
        return $this->hasMany(Attendance::class, 'courseID');
    }
}
