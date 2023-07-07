<?php

namespace App\Models\soft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationSoft extends Model
{
    use HasFactory;

    protected $fillable = ['file'];

    protected $hidden = ['created_at','updated_at'];
}
