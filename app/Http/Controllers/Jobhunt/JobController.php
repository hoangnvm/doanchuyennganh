<?php

    namespace App\Http\Controllers\Jobhunt;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Models\RecruitModel as RecruitModel; 
    use App\Http\Models\JobModel as JobModel; 

    class JobController extends Controller
    {
        private $pathViewController = 'jobhunt.pages.job.';
        private $controllerName = 'job';
        private $recruitModel;
        private $model;
        private $params;

        public function __construct(){
            $this->recruitModel = new RecruitModel();
            $this->model = new JobModel();
            $this->params = [];
            view()->share('controllerName', $this->controllerName);
        }
        public function index(Request $request){
            // echo '<pre>';
            // print_r(session('recruitInfo'));
            // echo '</pre>';
            // die();
            $this->params['recruit_id'] = session('recruitInfo')['id'];
            $items = $this->model->listItems($this->params, ['task' => 'frontend-manager-list-items']);
            return view($this->pathViewController . 'index', [
                'items' => $items
            ]);
        }

        public function form(Request $request){        
           
            $item = null;
            if($request->id !== null){
                $params['id'] = $request->id;
                $item = $this->model->getItem($params, ['task' => 'get-item']);
            }
            return view($this->pathViewController . 'form', [
                'item' => $item
            ]);
        }

        public function saveJobFrontend(Request $request){
            if($request->method() == "POST"){              
                $params = $request->all();
                $params['recruit_id'] = session('recruitInfo')['id'];
                $task = 'add-item';
                $notify = "Thêm phần tử thành công";
                if(@$params['id'] !== null){    
                    $task = 'edit-item';
                    $notify = "Cập nhật phần tử thành công";
                }
                $this->model->saveItem($params,['task' => $task]);                
                return redirect()->route($this->controllerName . '/manager-job-frontend')->with('my_notify', $notify);
           }
        }

        public function singleJob(Request $request){
            $item = null;
            if($request->id !== null){
                $params['id'] = $request->id;
                $item = $this->model->getItem($params, ['task' => 'get-item-frontend']);
            }
            return view($this->pathViewController . 'single_job', [
                'item' => $item
            ]);
        }

        public function deleteJob(Request $request){
            $params['id'] = $request->id;
            $this->model->deleteItems($params, ['task' => 'delete-job-frontend']);
            return redirect()->route($this->controllerName . '/manager-job-frontend')->with('my_notify', 'Xoá thành công!');
        }
    }