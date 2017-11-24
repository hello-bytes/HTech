<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:36
 */

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input, Notification, Auth, Request, Cache;
use Illuminate\Routing\Controller as BaseController;
use App\Model\Tag;
use App\Model\Article;
use App\Model\ArticleStatus;

class ArticleController extends Controller{

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

    public function create(){
        $category = \DB::table('category')->paginate(100);
        return view('backend.article.create')->with("categorys",$category);
    }

    public function store()
    {
        //try {

            $content = $this->queryString("content","");
            $summary = $this->queryString("summary","");
            if($summary == null ||  strlen($summary) == 0){
                $summary = strCut($content,80);
            }

            $data = array(
                'title' => $this->queryString("title",""),
                'user_id' => Auth::user()->id,
                'cate_id' => $this->queryString("category","0"),
                'content' => $content,
                'summary' => $summary,
                'tags' => Tag::SetArticleTags($this->queryString("tags","")),
            );

            if ($article = Article::create($data)) {
                if (ArticleStatus::initArticleStatus($article->id)) {
                    return redirect('/backend/article');
                } else {
                    self::destroy($article->id);
                }
            }
        //} catch (\Exception $e) {
            //return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        //}
    }

    public function destroy($id){
        Article::destroy([$id]);
        return redirect('/backend/article');
    }

    public function edit($id){
        $article = Article::find($id);
        if($article == null){
            $this->notFound();
        }
        $category = \DB::table('category')->paginate(100);
        return view('backend.article.edit')->with("article",$article)->with("categorys",$category);
    }

    public function update($id){
        $content = $this->queryString("content","");
        $summary = $this->queryString("summary","");
        if($summary == null ||  strlen($summary) == 0){
            $summary = strCut($content,80);
        }

        $data = array(
            'title' => $this->queryString("title",""),
            'user_id' => Auth::user()->id,
            'cate_id' => $this->queryString("cate_id","0"),
            'content' => $content,
            'summary' => $summary,
            'tags' => Tag::SetArticleTags($this->queryString("tags","")),
        );

        if (Article::where('id', $id)->update($data)) {
            return redirect("/backend/article");
        }else{
            $article = Article::find($id);
            $article->content = $content;
            $article->summary = $summary;
            $article->title = $this->queryString("title","");

            return view('backend.article.edit')->with("article",$article);
        }
    }


}