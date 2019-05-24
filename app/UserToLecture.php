<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class UserToLecture extends Model
{
    protected $fillable = [
    	'user_id', 'lectures_id'
    ];
}
