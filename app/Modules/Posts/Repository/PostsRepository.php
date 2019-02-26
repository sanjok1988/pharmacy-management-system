<?php
namespace App\Modules\Posts\Repository;

use App\Modules\Posts\Models\Posts;
use App\Contracts\EloquentRepository;
use Illuminate\Database\QueryException;
use App\Modules\Posts\Repository\IPosts;

class PostsRepository extends EloquentRepository implements IPosts
{
    public function getModel()
    {
        return Posts::class;
    }

    /**
    * just implode category[]
    *
    * @param [type] $request
    * @param [type] $array
    * @return array
    */
    public function getCategory($request, $array)
    {
        if (is_array($request->category)) {
            $array['category'] = implode(',', $request->category);
        } else {
            $array['category'] = 'uncategorize';
        }
        return $array;
    }

    public function getAllCategory()
    {
        return $this->model->category();
    }

    public function insertGetId($data)
    {
        return $this->_model->insertGetId($data);
    }
}
