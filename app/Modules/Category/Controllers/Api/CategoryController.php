<?php

namespace App\Modules\Category\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Category\Repository\ICategory;
use App\Modules\Category\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    protected $model;

    public function __construct(ICategory $model)
    {
        $this->middleware('api');
        $this->model = $model;
    }

    public function getCategory()
    {
        return response()->json(['category' => $this->model->getall()]);
    }
    public function getData()
    {
        $data = $this->model->paginate(10);
        
        $response = [
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem()
            ],
            'data' => $data
          

        ];
        return response()->json($response);
    }

    public function store(StoreCategoryRequest $request)
    {
        if ($this->model->create($request->only('name', 'display_name'))) {
            //json(string|array $data = [], int $status = 200, array $headers = [], int $options = 0)
            return response()->json(["success", 200]);
        } else {
            return response()->json(["failed", 0]);
        }
    }

    public function edit($id)
    {
        return response()->json($this->model->find($id));
    }

    public function update(Request $request, $id)
    {
        if ($this->model->update($id, $request->only('display_name'))) {
            return response()->json(["success", 200]);
        } else {
            return response()->json(["failed", 0]);
        }
    }

    public function destroy($id)
    {
        if ($this->model->delete($id)) {
            return response()->json(["success", 200]);
        } else {
            return response()->json(["failed", 0]);
        }
    }
}
