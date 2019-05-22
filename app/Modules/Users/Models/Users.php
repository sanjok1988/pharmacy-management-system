<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $guarded = ['id','created_at', 'updated_at'];
}
