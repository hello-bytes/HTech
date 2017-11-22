<?php
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/21
 * Time: 上午12:58
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Article;

class ArticleController extends BaseController
{
    public function index(){
        $article = Article::getNewsArticle(8);
        return view("article.index")->with("articleList",$article)->with("page",0);
    }

    public function article($articleId){
        $article = Article::find($articleId);
        if($article == null){
            return abort(404);
        }
        return view("article.article")->with("article",$article);
    }
}