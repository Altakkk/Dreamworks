<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course(){
        return $this->belongsTo(Teacher::class,'courseID');
    }
    public function attendances(){
        return $this->hasMany(Attendance::class,'studentID');
    }
}
