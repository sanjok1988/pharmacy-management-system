<?php

namespace App\Http\Controllers;

use App\Modules\News\Models\News;
use App\Modules\Category\Models\Category;
use App\Http\Controllers\News\INews;

class NewsController extends Controller
{
    protected $news;
    protected $category;


    protected $INews;
    private $_news_field = ['id', 'title', 'highlights', 'category', 'author', 'lang', 'image', 'link', 'publish_date'];

    public function __construct(INews $news, Category $category)
    {
        $this->news = $news;
        $this->category = $category;
    }

    //list all news in news section
    public function getNews($lang)
    {
        //create session for language
        $this->news->setLang($lang);

        $news = $this->news->paginate(10);

        $feature_news = $this->news->getFeaturedNews(3);
        $category = $this->getAllCategory();
        return view('hibiku.news-list_page', compact('newsdata', 'feature_news', 'news', 'category'));
    }


    /**
     * fetch news for detail
     *
     * @param [type] $id
     * @return void
     */
    public function findNews($id)
    {
        $newsdata = $this->news->findNews($id);
        
        $feature_news = $this->news->getFeaturedNews(3);

        $category = $this->getAllCategory();

        return view('hibiku.newsdetail_page', compact('newsdata', 'feature_news', 'category'));
    }

    /**
     * redirect to news page on the basis of language
     * also work for news listing by category
     */

    public function listByCategory($category)
    {
        if ($category) {
            $news = $this->news->getNewsByCategory($category)->paginate(10);
        }
        $feature_news = $this->news->getFeaturedNews(3);
        $category = $this->getAllCategory();
        $newsdata = $this->news->getNewsByCategory($category);

        return view('hibiku.news-list_page', compact('newsdata', 'category', 'feature_news', 'news'));
    }

    /**
     * fetch all category
     *
     * @return collection
     */
    public function getAllCategory()
    {
        return $this->category->select('name', 'display_name')->get();
    }
}
