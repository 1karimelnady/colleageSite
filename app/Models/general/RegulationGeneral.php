<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationGeneral extends Model
{
    use HasFactory;

    protected $table = "regulation_generals";
    protected $fillable = ['file'];

    protected $hidden = ['created_at','updated_at'];
}
