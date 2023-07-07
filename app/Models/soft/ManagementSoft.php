<?php

namespace App\Models\soft;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementSoft extends Model
{
    use HasFactory;

    protected $fillable = ['id','manager_name','manager_job'];
    
    protected $hidden = ['updated_at','created_at'];


}
