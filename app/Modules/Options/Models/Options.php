<?php

namespace App\Modules\Options\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $table = "options";
    protected $fillable = ['option', 'value'];
}
