<?php

namespace App\Modules\Customers\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model {

    protected $table = "customers";
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

}
