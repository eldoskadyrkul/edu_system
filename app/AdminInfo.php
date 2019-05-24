<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    protected $fillable = [
    	'firstname', 'lastname', 'gender',
    	'admin_birthday', 'mobile_phone', 'address'
    ];
}
