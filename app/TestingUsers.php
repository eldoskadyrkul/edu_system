<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class TestingUsers extends Model
{
    protected $fillable = [
    	'question', 'optionA', 'optionB', 'optionC', 'optionD', 'correct_answer'
    ];
}
