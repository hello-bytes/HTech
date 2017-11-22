<?php
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/21
 * Time: 下午8:40
 */


namespace App\Http\Controllers\backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Article;

class BackendController extends BaseController{

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
        return view("backend.index");
    }

}
