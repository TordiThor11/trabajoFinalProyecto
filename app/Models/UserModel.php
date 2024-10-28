<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'actor';
    protected $primaryKey = 'actor_id';

    protected $returnType = UserModel::class; #'array'/ 'object' / 'App/Models/UserModel';


}