<?php
namespace App\Http\Controllers\News;

interface INews
{
    public function getLang();
    public function setLang($lang);
    public function getNews($take);
    public function findNews($id);
    public function getFeaturedNews($take);
    public function getNewsByCategory($category);
    public function getNewsByLang($take);
    public function paginate($take);
}
