<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeCouncil extends Model
{
    use HasFactory;
     
    protected $table = "college_councils";
    protected $fillable = ['file','title'];

    protected $hidden = ['created_at','updated_at'];
}
