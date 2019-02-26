<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $guarded = ['id','created_at', 'updated_at', 'deleted_at',];

    public function categories()
    {
        return $this->belongsTo('\App\Modules\Category\Models\Category');
    }
}
