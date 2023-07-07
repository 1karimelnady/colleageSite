<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaStudie extends Model
{
    use HasFactory;
    
    protected $table = "diploma_studies";
    protected $fillable = ['diploma_file'];

    protected $hidden = ['created_at','updated_at'];
}
    