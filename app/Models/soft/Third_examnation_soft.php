<?php

namespace App\Models\soft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Third_examnation_soft extends Model
{
    use HasFactory;

    protected $table = "third_examnation_soft";

    protected $fillable = ['file','title'];

    protected $hidden = ['created_at','updated_at'];
    public $Timestamp = false;

  
}
