<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\UserModel as MainModel;
use App\Http\Requests\AuthLoginRequest as MainRequest;

class AuthController extends Controller
{
    private $pathViewController = 'admin.pages.auth.';
    private $controllerName = 'auth';
    private $model;
    private $params = [];

    public function __construct(){
        view()->share('controllerName', $this->controllerName);        
    }

   public function login(Request $request){
       return view($this->pathViewController . 'login');
   }

   public function postLogin(MainRequest $request){
       if($request->method() == "POST"){
           $params = $request->all();
           
           $userModel = new MainModel();
           $userInfo = $userModel->getItem($params, ['task' => 'auth-login']);

           if(!$userInfo)   return redirect()->route($this->controllerName. '/login')->with('my_notify', 'Tài khoản hoặc mật khẩu không chính xác');
           $request->session()->put('userInfo', $userInfo);
           return redirect()->route('dashboard/manager');
       }
   }

   public function logout(Request $request){
       if($request->session()->has('userInfo')) $request->session()->pull('userInfo');
       return redirect()->route($this->controllerName. '/login');
   }

}
