<?php

namespace App\Modules\Roles\Controllers;

use Illuminate\Http\Request;
use App\Modules\Roles\Models\Roles;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct(Roles $roles)
    {
        $this->roles = $roles;
    }
    
    public function index()
    {
        $data = $this->roles->paginate(10);
        return view("Roles::index", compact('data'));
    }
    public function getData()
    {
        $data = $this->roles->paginate(10);
        
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
}
