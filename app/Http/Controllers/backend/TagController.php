<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:36
 */

use Illuminate\Routing\Controller as BaseController;

class TagController extends BaseController{

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

}