<?php

namespace App\Models\soft;

use App\Models\soft\Second_Soft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_courses_Soft extends Model
{
    use HasFactory;

    protected $table = "Second_course_Soft";

    protected $fillable = ['course_name','course_num','credit_hour_course','previous_course_name'];

    protected $hidden = ['created_at','updated_at'];
    public $Timestamp = false;



   
}
