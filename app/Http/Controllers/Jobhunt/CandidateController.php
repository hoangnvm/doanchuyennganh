<?php

    namespace App\Http\Controllers\Jobhunt;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Models\CandidateModel as CandidateModel; 
    use App\Http\Models\JobModel as JobModel; 
    use App\Http\Models\AppliedJobModel as AppliedJobModel;

    class CandidateController extends Controller
    {
        private $pathViewController = 'jobhunt.pages.candidate.';
        private $controllerName = 'candidate';
        private $candidateModel;

        public function __construct(){
            $this->candidateModel = new CandidateModel();
            $this->jobModel = new JobModel();
            $this->appliedJobModel = new AppliedJobModel();
            view()->share('controllerName', $this->controllerName);
        }
        public function index(Request $request){
            $params['id'] = session('candidateInfo')['id'];           
            $item = $this->candidateModel->getItem($params, ['task' => 'frontend-get-item']);
            return view($this->pathViewController . 'index', [
                'item' => $item
            ]);
        }

        public function save(Request $request){
            $params = $request->all();
            if($request->method() == "POST"){  
                if(@$params['id'] !== null){
                    $task = 'edit-item';
                    $notify = "Cập nhật phần tử thành công"; 
                }                        
                $this->candidateModel->saveItem($params,['task' => $task]);                
                return redirect()->route($this->controllerName . '/profile')->with('my_notify', $notify);  
            }     
        }

        public function appliedJob(Request $request){
            $request->id; 
            $params['job_id'] = $request->id;
            $params = $this->jobModel->getItem($params, ['task' => 'frontend-get-item-job']);
            foreach($params as $key => $value){
                $params[$key]['candidate_id'] = session('candidateInfo')['id'];
                $params[$key]['status'] = '0';
            }        
            $this->appliedJobModel->saveItem($params,['task' => 'add-item']);
            return redirect()->route('candidate/manager-job-applied')->with('my_notify', 'Nộp đơn thành công, vui lòng chờ phản hồi');
        }

        public function showAppliedJob(Request $request){
            $params['candidate_id'] = session('candidateInfo')['id']; 
            $items = $this->appliedJobModel->listItems($params, ['task' => 'frontend-get-list-item-applied']);
            return view($this->pathViewController . 'manager_job_applied', [
                'items' => $items
            ]);
        }

        public function candidateSingle(Request $request){
            $params['id'] = $request->id;            
            $item = $this->candidateModel->getItem($params, ['task' => 'frontend-get-item']);

            return view($this->pathViewController . 'candidate_single', [
                'item' => $item
            ]);
        }

        public function changePasswordCandidate(Request $request){
            return view($this->pathViewController . 'change_password');
        }

        public function changePasswordCandidatePost(Request $request){
            $params = $request->all();
            $params['id'] = session('candidateInfo')['id'];     
            $this->candidateModel->saveItem($params, ['task' => 'change-password']);
            return redirect()->route($this->controllerName . '/profile')->with('my_notify', 'Cập nhật thành công!');
           
        }

    }