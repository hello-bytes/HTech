<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:36
 */

use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $articles = \DB::table('article')->paginate(15);
        return view("backend.article.index")->with("articles",$articles);
    }

}