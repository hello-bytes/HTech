<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:36
 */

use App\Model\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller{

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
        $categories = \DB::table('category')->paginate(15);
        return view("backend.category.index")->with("categories",$categories);
    }

    public function create(){
        return view('backend.category.create');
    }

    public function store()
    {
        $name = $this->queryString("name","");
        $data = array(
            'name' => $name,
        );

        if (Category::create($data)) {
            return redirect('/backend/category');
        }
    }

    public function destroy($id){
        Category::destroy([$id]);
        return redirect('/backend/category');
    }


    public function edit($id){
        $category = Category::find($id);
        if($category == null){
            $this->notFound();
        }
        return view('backend.category.edit')->with("category",$category);
    }

    public function update($id){
        $name = $this->queryString("name","");

        $data = array(
            'name' => $name,
        );

        if (Category::where('id', $id)->update($data)) {
            return redirect("/backend/category");
        }else{
            $category = Category::find($id);
            $category->name = $name;

            return view('backend.category.edit')->with("category",$category);
        }
    }
}