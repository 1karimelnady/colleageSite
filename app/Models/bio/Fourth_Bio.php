<?php

namespace App\Models\bio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourth_Bio extends Model
{
    use HasFactory;

    protected $table = "Fourth_Bio";

    protected $fillable = ['image'];
    protected $hidden = ['updated_at','created_at'];
    public $Timestamp = false;


 
}
