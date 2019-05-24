<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class InfoPerson extends Model
{
    protected $fillable = [
    	'firstname', 'lastname', 'date_birth', 
    	'speciality', 'address', 'mobile_phone', 
    	'user_id'
    ];
}
