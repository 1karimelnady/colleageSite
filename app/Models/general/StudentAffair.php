<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAffair extends Model
{
    use HasFactory;

    protected $table = "student_affairs";

    protected $fillable = ['file','title'];

    protected $hidden = ['created_at','updated_at',"manager_biography","managerjob","manager_name", "member_tybe","member_job","member_name"];

}
