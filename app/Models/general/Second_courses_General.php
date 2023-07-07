<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_courses_General extends Model
{
    use HasFactory;

    protected $table = "secondcourses_general";

    protected $fillable = ['course_name','course_num','credit_hour_course','previous_course_name'];

    protected $hidden = ['updated_at','created_at'];
    public $Timestamp = false;
}
