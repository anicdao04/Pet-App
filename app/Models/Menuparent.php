<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menuparent extends Model
{
    use HasFactory;
    protected $table = "menuparents";
    protected $fillables = ['name','image'];
}
