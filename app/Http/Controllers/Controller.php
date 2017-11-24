<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function queryString($key, $def){
        if(array_key_exists($key,$_GET)){
            return $_GET[$key];
        }

        if(array_key_exists($key,$_POST)){
            return $_POST[$key];
        }

        return $def;
    }

    public function notFound(){
        abort(404);
        exit;
    }
}
