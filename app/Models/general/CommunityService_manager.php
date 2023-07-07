<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityService_manager extends Model
{
    use HasFactory;

    protected $table = "communityservice_manager";

    protected $fillable = ['manager_name','managerjob','manager_biography'];

    protected $hidden = ['created_at','updated_at'];
}
