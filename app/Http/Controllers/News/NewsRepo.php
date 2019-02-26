<?php
namespace App\Http\Controllers\News;

use App\Modules\News\Models\News;
use App\Http\Controllers\News\INews;

class NewsRepo implements INews
{
    protected $news;

    private $_news_field = ['id', 'title', 'highlights', 'category', 'author', 'lang', 'image', 'link', 'publish_date', 'created_at'];

    private $_lang;

    public function __construct(News $news)
    {
        $this->lang = getNewsLang();
        $this->news = $news;
    }

    public function getLang()
    {
        return $this->_lang;
    }
    public function setLang($lang)
    {
        $this->_lang = $lang;
        //create session variable
        setNewsLang($lang);//function from bootstrap/helper
    }

    public function getNews($take)
    {
        return $this->news
        ->select($this->_news_field)
        ->where('lang', getNewsLang())
        ->take($take)
        ->orderBy('id', 'DESC');
    }
    
    //paginate news
    public function paginate($take)
    {
        return $this->news
        ->select($this->_news_field)
        ->where('lang', $this->_lang)
        ->paginate($take);
    }

    public function findNews($id)
    {
        array_push($this->_news_field, 'content');
        
        return $this->news->select($this->_news_field)->find($id);
    }

    public function getFeaturedNews($take)
    {
        return $this->getNewsByCategory($category = 'featured')->take($take)->get();
    }

    /**
     * fetch news by category name
     */
    public function getNewsByCategory($category)
    {
        return $this->news
        ->select($this->_news_field)
        ->where('lang', getNewsLang())
        ->where('category', 'LIKE', '%'.$category.'%');
    }

    //fetch news by en or jp
    public function getNewsByLang($take)
    {
        return $this->getNews($take)->get();
    }
}
