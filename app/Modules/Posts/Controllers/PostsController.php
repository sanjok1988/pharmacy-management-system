<?php

namespace App\Modules\Posts\Controllers;

use Session;
use Illuminate\Http\Request;

use App\Modules\BaseController;

use App\Modules\News\Repository\IPosts;

use Illuminate\Support\Facades\Cookie;
use App\Http\Traits\UploadTrait as upload;
//use App\Modules\CategoryNews\Repository\ICategoryNews;


use App\Modules\Posts\Requests\NewsRequest;
use App\Modules\Category\Repository\ICategory;

class PostsController extends BaseController
{
    use upload;

    protected $news;

    protected $category;
    
    //protected $categoryNews;

    public function __construct(IPosts $news, ICategory $category) //ICategoryNews $categoryNews)
    {
        $this->middleware('auth');
        $this->news = $news;
        $this->category = $category;
        //$this->categoryNews = $categoryNews;
    }

    /**
     * show news in table
     *
     * @return void
     */
    public function index()
    {
        $news = $this->news->getAll();
        return view("Posts::index", compact('news'));
    }

    /**
     * show create form
     *
     * @return void
     */
    public function create()
    {
        $categories = $this->category->getAll();

        return view("Posts::create", compact('categories'));
    }

    /**
     * store data in database
     * upload image
     *
     * @param NewsRequest $request
     * @return void
     */
    public function store(NewsRequest $request)
    {
        $news = $request->only('title', 'highlights', 'content', 'author', 'category', 'publish_date', 'lang', 'link');
      
        //upload image using trait
        if ($request->file('image') != null) {
            $image = $this->upload($request->file('image'));
          
            //insert imagename in array
            $news['image'] = $image;
        }
        
        //get category seperated with comman
        //return $news['category]
        $news = $this->news->getCategory($request, $news);
        if ($this->news->create($news)) {
            Session::flash("message", "Success");
        } else {
            Session::flash("message", "Failed");
        }

        return redirect('admin/news');
    }

   
    //show Edit form
    public function edit($id)
    {
        $news= $this->news->find($id);

        $categories = $this->category->getAll();

        return view("Posts::edit", compact('news', 'categories'));
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
        $news = $request->only('title', 'highlights', 'content', 'author', 'category_id', 'category', 'publish_date', 'lang', 'link');
        //upload image using trait
        if ($request->file('image')!= null) {
            $image = $this->upload($request->file('image'));
            //insert imagename in array
            $news['image'] = $image;
        }
        $news = $this->news->getCategory($request, $news);
        if ($this->news->update($id, $news)) {
            Session::flash("message", "success");
        } else {
            Session::flash("message", "Failed");
        }
        return redirect('/admin/news');
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
        $news= $this->news->find($id);

        return view("Posts::show", compact('news', 'categories'));
    }
    
    public function delete($id)
    {
        if ($this->news->delete($id)) {
            Session::flash("message", "success");
        } else {
            Session::flash("message", "Failed");
        }
        return redirect('/admin/news');
    }
}
