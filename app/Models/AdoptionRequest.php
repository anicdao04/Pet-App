<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    use HasFactory;
    protected $table = "adoption_requests";
    protected $fillables = ['adopt_name','adopt_address','adopt_contact','adopt_email','message','pet_name','pet_category','pet_breed','pet_age','date_created'];
}
