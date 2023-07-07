<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Council_manager extends Model
{
    use HasFactory;

    protected $table = "council_manager";
    protected $fillable = ['manager_name','manager_job','manager_biography'];

    protected $hidden = ['created_at','updated_at'];
}
