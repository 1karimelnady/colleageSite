<?php

namespace App\Models\soft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouncilSoft extends Model
{
    use HasFactory;

    protected $fillable = ['id','title','file'];
}
