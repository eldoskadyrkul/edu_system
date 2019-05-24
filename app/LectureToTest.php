<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class LectureToTest extends Model
{
    protected $fillable = [
    	'lecture_id', 'tests_id'
    ];
}
