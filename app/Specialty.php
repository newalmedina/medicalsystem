<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
     use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "specialties";
    protected $fillable = ["description"];
}
