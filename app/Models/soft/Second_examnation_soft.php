<?php

namespace App\Models\soft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_examnation_soft extends Model
{
    use HasFactory;

    protected $table = "second_examnation_soft";

    protected $fillable = ['file','title'];

    protected $hidden = ['created_at','updated_at'];
    public $Timestamp = false;

   
}
