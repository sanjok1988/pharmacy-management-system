<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Products\Models\Products;

class FrontendController extends Controller
{
    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    public function home()
    {
        $products = $this->getProducts()->take(4)->get();
        
        return view('Frontend::index', compact('products'));
    }

    /**
     * Common function to retrive products
     *
     * @return Builder
     */
    public function getProducts()
    {
        return $this->product->select('products.*', 'c.category_name')->join('categories as c', 'c.id', '=', 'products.category_id');
    }

    public function getByCategory(Request $request)
    {
        $slug = $request->slug;
        $cid = Category::getCategoryIdBySlug($slug);
        $data= $this->getProducts()->where('category_id', $cid)->paginate(10);
        return view("Frontend::products", compact('data'));
    }

    public function getByType(Request $request)
    {
        $slug = $request->slug;
       
        $data= $this->getProducts()->where('type', $slug)->paginate(10);
        return view("Frontend::products", compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductList()
    {
        $data = $this->getProducts()->paginate(10);
        return view("Frontend::products", compact('data'));
    }

    public function view(Request $request)
    {
        $data = $this->getProducts()->find($request->id);
        $similars = $this->getProducts()->where('category_id', $data->category_id)->take(8)->get();
        return view("Frontend::view", compact('data', 'similars'));
    }

    public function getProductData(Request $request)
    {
        $data = $this->product->paginate(10);
        if ($request->ajax()) {
            $response = [
                'pagination' => [
                    'total' => $data->total(),
                    'per_page' => $data->perPage(),
                    'current_page' => $data->currentPage(),
                    'last_page' => $data->lastPage(),
                    'from' => $data->firstItem(),
                    'to' => $data->lastItem()
                ],
                'list' => $data
              
    
            ];
            return response()->json($response);
        }
    }

    public function contact()
    {
        return view('Frontend::contact');
    }
}
