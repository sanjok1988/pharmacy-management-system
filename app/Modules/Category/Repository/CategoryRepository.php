<?php

namespace App\Modules\Category\Repository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentRepository;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Repository\ICategory;

class CategoryRepository extends EloquentRepository implements ICategory
{
    public function getModel()
    {
        return Category::class;
    }
}
