<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/10/4
 * Time: 上午12:58
 */

use App\Model\Article;

class IndexController extends Controller
{
    public function index(){
        $article = Article::getNewsArticle(15);
        return view("index.index")->with("articleList",$article)->with("page",0);
    }
}