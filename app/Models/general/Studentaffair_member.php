<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentaffair_member extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = "studentaffair_member";

    protected $fillable = ['member_name','member_job','member_tybe'];
    protected $hidden = ['created_at','updated_at'];
}
