<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/25
 * Time: 上午12:45
 */


use App\Http\Controllers\Controller;

class AboutController extends Controller{

    public function index(){
        return view("about.index");
    }

}