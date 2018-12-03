<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subadmin extends Model
{
    protected $fillable =[
    'role_id','name','username','email', 'password','image',
	];
}
