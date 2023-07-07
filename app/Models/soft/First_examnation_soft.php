<?php

namespace App\Models\soft;

use App\Models\bio\First_courses_Soft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class First_examnation_soft extends Model
{
    use HasFactory;

    protected $table = "first_examnation_soft";

    protected $fillable = ['file','title'];
    
    protected $hidden = ['created_at','updated_at'];
    public $Timestamp = false;
   
}
