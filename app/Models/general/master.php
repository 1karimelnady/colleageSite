<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master extends Model
{
    use HasFactory;

    protected $table = "masters";
    protected $fillable = ['master_file'];

    protected $hidden = ['created_at','updated_at'];

}
