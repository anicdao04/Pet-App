<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trivia extends Model
{
    use HasFactory;
    protected $table = "trivias";
    protected $fillables = ['title','description', 'date_created'];
}
