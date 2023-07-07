<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementGeneral extends Model
{
    use HasFactory;

    protected $table = "management_generals";

    protected $fillable = ['id','manager_name','manager_job'];

    protected $hidden = ['created_at','updated_at'];
    
}
