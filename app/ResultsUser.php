<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class ResultsUser extends Model
{
    protected $fillable = [
    	'results', 'uncorrect', 'attempts', 'percentage', 'user_id', 'name_lectures'
    ];

    public function info_person()
    {
    	return $this->hasMany('InfoPerson', 'firstname', 'lastname');
    }

    public function results_user() {
    	return $this->hasMany('ResultsUser', 'results', 'uncorrect', 'attempts', 'percentage');
    }
    /**
	* @var this
    */

    public function lecture() {
    	return self::hasOne('KazEDU\Lecture', 'name_lectures');
    } 
}
