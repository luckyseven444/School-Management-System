<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $table = 'guardians';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'class','roll_no'
    ];
}
