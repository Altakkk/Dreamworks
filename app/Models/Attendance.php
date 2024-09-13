<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course(){
        return $this->belongsTo(Course::class, 'courseID');
    }
    public function student(){
        return $this->belongsTo(Student::class, 'student_ID');
    }
    public function stat(){
        return $this->belongsTo(Stat::class, 'statID');
    }
}