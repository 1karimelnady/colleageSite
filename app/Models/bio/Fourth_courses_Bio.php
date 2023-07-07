<?php

namespace App\Models\bio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourth_courses_Bio extends Model
{
    use HasFactory;

    protected $table = "Fourth_course_Bio";

    protected $fillable = ['course_name','course_num','credit_hour_course','previous_course_name'];

    protected $hidden = ['updated_at','created_at'];
    public $Timestamp = false;
 
}
