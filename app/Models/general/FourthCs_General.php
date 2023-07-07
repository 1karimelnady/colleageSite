<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FourthCs_General extends Model
{
    use HasFactory;

    protected $table = "fourthcs_general";

    protected $fillable = ['image'];


    protected $hidden = ['updated_at','created_at'];
    public $Timestamp = false;
}
