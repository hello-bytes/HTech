<?php namespace App\Http\Controllers\backend;
/**
 * Created by PhpStorm.
 * User: shishengyi
 * Date: 2017/11/22
 * Time: 上午11:37
 */

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller{

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

    public function create(){
        return view('backend.user.create');
    }

    public function store()
    {
        $name = $this->queryString("name","");
        $email = $this->queryString("email","");
        $password = $this->queryString("password","");
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        );

        if (User::create($data)) {
            return redirect('/backend/user');
        }
    }

    public function destroy($id){
        Tag::destroy([$id]);
        return redirect('/backend/user');
    }
}