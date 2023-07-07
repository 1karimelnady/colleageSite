<?php

namespace App\Models\soft;

use App\Models\bio\Fourth_courses_Soft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourth_Soft extends Model
{
    use HasFactory;

    protected $table = "Fourth_Soft";

    protected $fillable = ['image'];

    protected $hidden = ['updated_at','created_at'];

    public $Timestamp = false;

    
}
