<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:37
 */

use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController{

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
        $users = \DB::table('users')->paginate(15);
        return view("backend.user.index")->with("users",$users);
    }
}