<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
    	'name_lectures', 'short_desc', 'description_lectures', 'url_lectures'
    ];
}
