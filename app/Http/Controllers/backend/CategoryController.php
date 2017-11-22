<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:36
 */

use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController{

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
}