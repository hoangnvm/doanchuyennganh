<?php

    namespace App\Http\Controllers\Jobhunt;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Models\RecruitModel as RecruitModel; 
    use App\Http\Models\AppliedJobModel as AppliedJobModel; 
    use Mail;

    class RecruitController extends Controller
    {
        private $pathViewController = 'jobhunt.pages.recruit.';
        private $controllerName = 'recruit';
        private $recruitModel;

        public function __construct(){
            $this->recruitModel = new RecruitModel();
            $this->appliedjobModel = new AppliedJobModel();
            view()->share('controllerName', $this->controllerName);
        }
        public function index(Request $request){
            $params['id'] = session('recruitInfo')['id'];
           
            $item = $this->recruitModel->getItem($params, ['task' => 'frontend-get-item']);
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
                $this->recruitModel->saveItem($params,['task' => $task]);                
                return redirect()->route($this->controllerName . '/profile')->with('my_notify', $notify);  
            }     
        }
        public function changeStatus(Request $request){
            $params['currentStatus'] = $request->status;
            $params['id'] = $request->id;
            $this->appliedjobModel->saveItem($params, ['task' => 'change-status']);
            return redirect()->route($this->controllerName . '/list-candidate')->with('my_notify', 'Cập nhật thành công!');
        }

        public function listCandidate(Request $request){
            $params['id'] = session('recruitInfo')['id'];
            $items = $this->appliedjobModel->listItems($params, ['task' => 'frontend-get-list-item-candidate']);

            return view($this->pathViewController . 'list_candidate', [
                'items' => $items
            ]);
        }

        public function formSendEmail(Request $request){
            return view($this->pathViewController . 'form_send_email');
        }

        public function sendEmail(Request $request){
            $params = $request->all();
            $name = $params['name'];
            $content = $params['content'];
            Mail::send('jobhunt.pages.recruit.send_email', array('name'=>$name,'content'=>$content), function($message){
                $message->from('nickhoctap1412@gmail.com', 'Lê Hoàng');
                $message->to('nickhoctap1412@gmail.com', 'Lê Hoàng')->subject('Test gửi email');
            });
            return redirect()->route($this->controllerName . '/list-candidate');
        }

        public function deleteCandidate(Request $request){
            $params['id'] = $request->id;
            $this->appliedjobModel->deleteItems($params, ['task' => 'delete-candidate-applied-job']);
            return redirect()->route($this->controllerName . '/list-candidate')->with('my_notify', 'Xoá thành công!');
        }

        public function changePasswordRecruit(Request $request){
            return view($this->pathViewController . 'change_password');
        }

        public function changePasswordRecruitPost(Request $request){
            $params = $request->all();
            $params['id'] = session('recruitInfo')['id'];     
            $this->recruitModel->saveItem($params, ['task' => 'change-password']);
            return redirect()->route($this->controllerName . '/profile')->with('my_notify', 'Cập nhật thành công!');
           
        }
    }