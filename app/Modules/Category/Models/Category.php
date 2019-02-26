<?php

namespace App\Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;
    
    protected $table = 'categories';

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function news(){
        return $this->hasMany('\App\Modules\News\Models\News');
    }
}
