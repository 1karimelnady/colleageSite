<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduateStudies extends Model
{
    use HasFactory;

    protected $table = "graduate_studies";
    protected $fillable = ['file','title'];

    
    protected $hidden = ['created_at','updated_at'];
}


