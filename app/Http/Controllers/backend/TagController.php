<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:36
 */

use App\Model\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller{

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
        $tags = \DB::table('tags')->paginate(15);
        return view("backend.tag.index")->with("tags",$tags);
    }

    public function create(){
        return view('backend.tag.create');
    }

    public function store()
    {
        $name = $this->queryString("name","");
        $data = array(
            'name' => $name,
        );

        if (Tag::create($data)) {
            return redirect('/backend/tag');
        }
    }

    public function destroy($id){
        Tag::destroy([$id]);
        return redirect('/backend/tag');
    }


    public function edit($id){
        $tag = Tag::find($id);
        if($tag == null){
            $this->notFound();
        }
        return view('backend.tag.edit')->with("tag",$tag);
    }

    public function update($id){
        $name = $this->queryString("name","");

        $data = array(
            'name' => $name,
        );

        if (Tag::where('id', $id)->update($data)) {
            return redirect("/backend/tag");
        }else{
            $tag = Tag::find($id);
            $tag->name = $name;

            return view('backend.tag.edit')->with("tag",$tag);
        }
    }

}