<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/12/2
 * Time: 上午12:20
 */

use App\Http\Controllers\Controller;
use App\Model\Article;

class SetupController extends Controller{

    public function index(){
        return view("setup.index");
    }

    public function dosetup(){
        $filepath = storage_path("inited.config");
        file_put_contents($filepath,"inited by htech");

        return redirect("/");
    }

}
