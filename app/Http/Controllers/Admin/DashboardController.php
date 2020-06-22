<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class DashboardController extends Controller
    {
        private $pathViewController = 'admin.pages.dashboard.';
        private $controllerName = 'dashboard';

        public function __construct(){
            view()->share('controllerName', $this->controllerName);
        }
        public function index(Request $request){
            return view($this->pathViewController . 'index');
        }
    }