<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'class','roll_no'
    ];
}
