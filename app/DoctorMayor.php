<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorMayor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "doctor_mayors";
    protected $fillable = ["user_id", "mayor_id"];
}
