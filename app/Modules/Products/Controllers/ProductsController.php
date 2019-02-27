<?php

namespace App\Modules\Products\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;
use App\Modules\Category\Models\Category;
use App\Modules\Products\Models\Products;
use App\Http\Traits\UploadTrait as Upload;

class ProductsController extends Controller
{
    use Upload;

    protected $product;

    protected $category;


    public function __construct(Products $product, Category $category) //ICategoryproduct $categoryproduct)
    {
        //$this->middleware('auth');
        $this->product = $product;
        $this->category = $category;
    }

    /**
     * show product in table
     *
     * @return void
     */
    public function index()
    {
        $data = $this->product->paginate(10);
        return view("Products::index", compact('data'));
    }
    
    public function getExpiredProduct()
    {
        $page = "expired list";
        $data = $this->product->where('exp_date', '<=', \Carbon\Carbon::now()->format("YYYY-mm-dd"))->paginate(10);
        return view("Products::index", compact('data', 'page'));
    }

    /**
     * show create form
     *
     * @return void
     */
    public function create()
    {
        $categories = $this->category->get();

        return view("Products::create", compact('categories'));
    }

    /**
     * store data in database
     * upload image
     *
     * @param productRequest $request
     * @return void
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except('_except');
        
        //upload image using trait
        if ($request->file('image') != null) {
            $image = $this->upload($request->file('image'));
          
            //insert imagename in array
            $product['image'] = $image;
        }
        
        if ($request->has('id')) {
            $product = $this->product->find($request->id);
            if ($product) {
                if ($product->update($data)) {
                    Session::flash("message", "Successfully Updated");
                } else {
                    Session::flash("message", "Update Failed");
                }
            } else {
                Session::flash("message", "Data not found");
            }
        } else {
            if ($this->product->create($data)) {
                Session::flash("message", "Successfully Recorded");
            } else {
                Session::flash("message", "Record Process Failed");
            }
        }

        return redirect(route('product.index'));
    }

   
    //show Edit form
    public function edit($id)
    {
        $page = "product";
        $action = "edit";
        $data= $this->product->find($id);

        $categories = $this->category->get();

        return view("Products::create", compact('data', 'categories', 'page', 'action'));
    }

    /**
     * update function
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $product = $request->except('_token');
        //upload image using trait
        if ($request->file('image')!= null) {
            $image = $this->upload($request->file('image'));
            //insert imagename in array
            $product['image'] = $image;
        }
        $product = $this->product->getCategory($request, $product);
        if ($this->product->update($id, $product)) {
            Session::flash("message", "success");
        } else {
            Session::flash("message", "Failed");
        }
        return redirect('/admin/product');
    }


    /**
     * softDelete row
     *
     * @param [int] $id
     * @return void
     */


    //Show
    public function show($id)
    {
        $categories = $this->category->getAll();
        $product= $this->product->find($id);

        return view("Products::show", compact('product', 'categories'));
    }
    
    public function delete($id)
    {
        if ($this->product->delete($id)) {
            Session::flash("message", "success");
        } else {
            Session::flash("message", "Failed");
        }
        return redirect('/admin/product');
    }
}
