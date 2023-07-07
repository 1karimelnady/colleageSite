<?php

namespace App\Models\bio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationBio extends Model
{
    use HasFactory;

    protected $fillable = ['file'];

    protected $hidden = ['created_at','updated_at'];
}
