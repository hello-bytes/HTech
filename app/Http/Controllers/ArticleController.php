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
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
{
    public function index(){
        $filepath = storage_path("inited.config");
        if( !file_exists($filepath)){
            return redirect("/setup");
        }


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