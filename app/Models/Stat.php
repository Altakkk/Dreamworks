<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course(){
        return $this->belongsTo(Teacher::class,'courseID');
    }
}
