<?php
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/10/4
 * Time: 上午12:58
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Article;

class IndexController extends BaseController
{
    public function index(){
        $article = Article::getNewsArticle(8);
        //print_r($article);
        //echo count($article['data']);
        //$page = new EndaPage($article['page']);
        return view("index.index")->with("articleList",$article)->with("page",0);
    }
}