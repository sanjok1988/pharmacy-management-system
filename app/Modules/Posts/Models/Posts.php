<?php

namespace App\Modules\Posts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $guarded = ['id','created_at', 'updated_at', 'deleted_at',];

    public function category()
    {
        return $this->belongsTo('\App\Modules\Category\Models\Category');
    }
}
