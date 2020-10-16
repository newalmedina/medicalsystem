<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporal_File extends Model
{
    protected $table="temporal_files";
    protected $fillable = ["file_directory","user_id"];
}
