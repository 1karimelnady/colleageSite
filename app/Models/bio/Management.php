<?php

namespace App\Models\bio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;
    protected $table = "management";

    protected $fillable = ['id', 'manager_name', 'manager_job'];
}
