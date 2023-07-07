<?php

namespace App\Models\general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdIt_General extends Model
{
    use HasFactory;

    protected $table = "Thirdit_general";

    protected $fillable = ['image'];


    protected $hidden = ['updated_at','created_at'];
    public $Timestamp = false;
}
