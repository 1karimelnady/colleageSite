<?php

namespace App\Models\soft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Third_Soft extends Model
{
    use HasFactory;

    protected $table = "Third_Soft";

    protected $fillable = ['image'];

    public $Timestamp = false;

    protected $hidden = ['updated_at','created_at'];

  
}
