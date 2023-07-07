<?php

namespace App\Models\soft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class First_Soft extends Model
{
    use HasFactory;

    protected $table = "First_Soft";

    protected $fillable = ['image'];

    protected $hidden = ['updated_at','created_at'];

    public $Timestamp = false;

  
}
