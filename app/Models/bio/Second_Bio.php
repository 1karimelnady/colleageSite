<?php

namespace App\Models\bio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_Bio extends Model
{
    use HasFactory;

    protected $table = "Second_Bio";

    protected $fillable = ['image'];

    protected $hidden = ['updated_at','created_at'];
    public $Timestamp = false;


    
}
