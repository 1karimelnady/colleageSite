<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentaffair_manager extends Model
{
    use HasFactory;

    protected $table = "studentaffair_manager";
    protected $fillable = ['manager_name','managerjob','manager_biography'];

    protected $hidden = ['created_at','updated_at'];
}
