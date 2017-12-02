<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/12/2
 * Time: 上午12:20
 */

use App\Http\Controllers\Controller;
use App\Model\Article;
use App\User;
use App\Model\System;

class SetupController extends Controller{

    public function index(){
        $filepath = storage_path("inited.config");
        if( file_exists($filepath)){
            return redirect("/");
        }

        $error = $this->queryString("error",0);

        return view("setup.index")->with("error",$error);
    }

    public function dosetup(){
        $filepath = storage_path("inited.config");
        if( file_exists($filepath)){
            return redirect("/");
        }

        $account = $this->queryString("account","");
        $password = $this->queryString("password","");

        if(strlen($account) == 0 || strlen($password) == 0){
            return redirect("/setup?error=1");

        }

        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if ( !preg_match( $pattern, $account ) ){
            return redirect("/setup?error=2");
        }

        $data = array(
            'name' => $account,
            'email' => $account,
            'password' => bcrypt($password),
        );

        if (!User::create($data)) {
            return redirect("/setup?error=3");
        }

        $filepath = storage_path("inited.config");
        file_put_contents($filepath,"inited by htech");

        System::setSystemValue("域名",$this->queryString("domain",""));
        System::setSystemValue("标题",$this->queryString("title",""));
        System::setSystemValue("备案号",$this->queryString("beian",""));


        return redirect("/");
    }

}
