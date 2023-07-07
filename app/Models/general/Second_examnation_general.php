<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_examnation_general extends Model
{
    use HasFactory;

    protected $table = "second_examnation_general";

    protected $fillable = ['file','title'];

    protected $hidden = ['updated_at','created_at'];
}
