<?php
namespace App\Modules\Category\Controllers;

use Session;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
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
        $data = $this->category->paginate(10);
        return view("Category::index", compact('data'));
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
    public function store(CategoryRequest $request)
    {
        $data = $request->only('category_name', 'details');
        if (empty($request->slug)) {
            $data['slug'] = strtolower($request->category_name);
        } else {
            $data['slug'] = strtolower($request->slug);
        }
        if (empty($request->status)) {
            {
            $data['status'] = "available";
        }
            if ($request->has('id')) {
                $find = $this->category->find($request->id);
                if ($find) {
                    if ($find->update($request->id)) {
                        Session::flash("message", "Successfully Updated");
                    } else {
                        Session::flash("message", "Update Failed");
                    }
                } else {
                    Session::flash("message", "Data not found");
                }
            } else {
                if ($this->category->create($data)) {
                    Session::flash('message', "Success");
                } else {
                    Session::flash('message', "Failed");
                }
            }
        }
        
      
        return redirect(route('category.index'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = "Category";
        $action = "edit";
        $data = $this->category->find($id);
        return view('Category::create', compact('data', 'page', 'action'));
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
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = $this->category->find($id);
        if ($find->delete()) {
            Session::flash("message", "success");
        } else {
            Session::flash("message", "Failed");
        }
        return redirect(route('category.index'));
    }
}
