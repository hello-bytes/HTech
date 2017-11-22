<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:38
 */

use Illuminate\Routing\Controller as BaseController;

class SystemSettingController extends BaseController{

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
        return view("backend.setting.index");
    }

}