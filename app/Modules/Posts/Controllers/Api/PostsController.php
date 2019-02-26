<?php

namespace App\Modules\Posts\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Posts\Repository\IPosts;

class PostsController extends Controller
{
    protected $model;
    protected $category;

    public function __construct(IPosts $model)
    {
        $this->middleware('api');
        $this->category = $category;
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

    public function store(Request $request)
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
