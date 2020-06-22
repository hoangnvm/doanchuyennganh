<?php

    namespace App\Http\Controllers\Jobhunt;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Models\CareerModel as CareerModel; 
    use App\Http\Models\RecruitModel as RecruitModel; 
    use App\Http\Models\CandidateModel as CandidateModel; 
    use App\Http\Models\JobModel as JobModel; 

    class HomeController extends Controller
    {
        private $pathViewController = 'jobhunt.pages.home.';
        private $controllerName = 'home';
        

        public function __construct(){
            view()->share('controllerName', $this->controllerName);
        }
        public function index(Request $request){
            

            
            $careerModel = new CareerModel();
            $jobModel = new JobModel();
            $itemsCareerModel = $careerModel->listItems(null, ['task' => 'frontend-list-items']);
           

            $itemsHotJob = $jobModel->getItem(null, ['task'=>'get-item-featured']);

            
            return view($this->pathViewController . 'index', [
                'itemsCareerModel' => $itemsCareerModel,
                'itemsHotJob' => $itemsHotJob,
                
            ]);
        }

        public function login(Request $request){
            return view($this->pathViewController . 'login');
        }

        public function loginRecruit(Request $request){
            $params = $request->all();
            $recruitModel = new RecruitModel();
            $recruitInfo = $recruitModel->getItem($params, ['task' => 'recruit-login']);
            if(!$recruitInfo)   return redirect()->route($this->controllerName. '/login')->with('my_notify', 'Tài khoản hoặc mật khẩu không chính xác');
            $request->session()->put('recruitInfo', $recruitInfo);
            return redirect()->route('recruit/profile'); 
        }

        public function loginCandidate(Request $request){
            $params = $request->all();
            $candidateModel = new CandidateModel();
            $candidateInfo = $candidateModel->getItem($params, ['task' => 'candidate-login']);
            if(!$candidateInfo)   return redirect()->route($this->controllerName. '/login')->with('my_notify', 'Tài khoản hoặc mật khẩu không chính xác');
            $request->session()->put('candidateInfo', $candidateInfo);
            return redirect()->route('candidate/profile'); 
        }

        public function register(Request $request){
            return view($this->pathViewController . 'register');
        }

        public function registerRecruit(Request $request){
            $params = $request->all();
            $recruitModel = new RecruitModel();
            $recruitModel->saveItem($params, ['task' => 'add-item']);
            $recruitInfo = $recruitModel->getItem($params, ['task' => 'recruit-login']);           
            return redirect()->route('home/login');             
        }

        public function registerCandidate(Request $request){
            $params = $request->all();
            $candidateModel = new CandidateModel();
            $candidateModel->saveItem($params, ['task' => 'add-item']);
            $candidateInfo = $candidateModel->getItem($params, ['task' => 'candidate-login']);           
            return redirect()->route('home/login');       
        }

        public function logout(Request $request){
            if($request->session()->has('recruitInfo')){
                $request->session()->pull('recruitInfo');
            }else if($request->session()->has('candidateInfo')){
                $request->session()->pull('candidateInfo');
            }
            return redirect()->route($this->controllerName);
        }

        public function listJob(Request $request){
             // Search Field
            $this->params['search']['value'] = $request->input('search_value', '');   
            $jobModel = new JobModel();
            $items = $jobModel->listItems($this->params, ['task' => 'frontend-list-items']);
            return view($this->pathViewController . 'list_job', [
                'params' => $this->params,
                'items' => $items
            ]);
        }

        public function listJobInCareer(Request $request){
            $this->params['career_id'] = $request->career_id;
            // Search Field
           $this->params['search']['value'] = $request->input('search_value', '');   
           $jobModel = new JobModel();
           $items = $jobModel->listItems($this->params, ['task' => 'frontend-list-items-in-career']);
           return view($this->pathViewController . 'list_job', [
               'params' => $this->params,
               'items' => $items
           ]);
       }
    }