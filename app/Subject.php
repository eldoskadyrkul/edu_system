<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
    	'subject_name', 'lecture_id'
    ];
}
