<?php

namespace App\Modules\Orders\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

    protected $table = "orders";
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

}
