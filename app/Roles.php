<?php

namespace KazEDU;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['user_id', 'roles_user'];
}
