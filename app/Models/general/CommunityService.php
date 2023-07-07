<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityService extends Model
{
    use HasFactory;
    protected $table = "community_services";
    protected $fillable = ['file','title'];

    protected $hidden = ['created_at','updated_at'];

}
