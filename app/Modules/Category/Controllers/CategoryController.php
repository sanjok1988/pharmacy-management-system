<?php
namespace App\Modules\Category\Controllers;

use Session;
use Validate;
use Illuminate\Http\Request;
use App\Modules\BaseController;
use App\Modules\Category\Repository\ICategory;
use App\Modules\Category\Requests\StoreCategoryRequest;
use App\Modules\Category\Requests\RequestUpdateCategory;

class CategoryController extends BaseController
{
    protected $category;

    public function __construct(ICategory $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getAll();
        return view("Category::index", compact('categories'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category::create');
    }

    /**
     * Store a newly created resource in storage.
     *sss
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if ($this->category->create($request->only('name', 'display_name'))) {
            Session::flash('message', "Success");
        } else {
            Session::flash('message', "Failed");
        }
        /**
         * continue button logic implementation
         */
        if ($request->has('continue')) {
            return redirect()->back();
        } else {
            return redirect(route('indexCategory'));
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = $this->category->find($id);
        return view('Category::edit', compact('category'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        ;
        if ($this->category->update($id, $request->only('name', 'display_name'))) {
            Session::flash("message", "success");
        } else {
            Session::flash('message', 'Failed');
        }
        return redirect(route('indexCategory'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->category->delete($id)) {
            Session::flash("message", "success");
        } else {
            Session::flash("message", "Failed");
        }
        return redirect(route('indexCategory'));
    }
}
