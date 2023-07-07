<?php

namespace App\Models\soft;

use App\Models\bio\Second_courses_Soft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_Soft extends Model
{
    use HasFactory;

    protected $table = "Second_Soft";

    protected $fillable = ['image'];

    protected $hidden = ['updated_at','created_at'];
    public $Timestamp = false;

    
}
