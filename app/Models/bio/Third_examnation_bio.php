<?php

namespace App\Models\bio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Third_examnation_bio extends Model
{
    use HasFactory;

    protected $table = "third_examnation_bio";

    protected $fillable = ['file','title'];

    protected $hidden = ['updated_at','created_at'];


  
}
