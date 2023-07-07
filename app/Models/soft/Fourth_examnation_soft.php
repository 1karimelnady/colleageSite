<?php

namespace App\Models\soft;

use App\Models\bio\Fourth_courses_Soft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourth_examnation_soft extends Model
{
    use HasFactory;

    protected $table = "fourth_examnation_soft";

    protected $fillable = ['file','title'];

    protected $hidden = ['created_at','updated_at'];
    public $Timestamp = false;

   
}
