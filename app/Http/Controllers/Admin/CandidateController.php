<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Models\CandidateModel as MainModel;
    use App\Http\Requests\CandidateRequest as  MainRequest;

    class CandidateController extends Controller
    {
        private $pathViewController = 'admin.pages.candidate.';
        private $controllerName = 'candidate';
        private $model;
        private $params = [];

        public function __construct(){
            $this->model = new MainModel();
            $this->params['pagination']['totalItemsPerPage'] = 5;
            view()->share('controllerName', $this->controllerName);
        }
        public function index(Request $request){    
            // Filter
            $this->params['filter']['status'] = $request->input('filter_status', 'all'); 
            // Search Field
            $this->params['search']['field'] = $request->input('search_field', ''); 
            $this->params['search']['value'] = $request->input('search_value', '');   
            $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
            $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
            return view($this->pathViewController . 'index', [
                'items' => $items,
                'itemsStatusCount' => $itemsStatusCount,
                'params' => $this->params
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

        public function save(MainRequest $request){
            if($request->method() == "POST"){
                $params = $request->all();
                $task = 'add-item';
                $notify = "Thêm phần tử thành công";
                if(@$params['id'] !== null){
                     $task = 'edit-item';
                     $notify = "Cập nhật phần tử thành công";
                }
     
                $this->model->saveItem($params,['task' => $task]);
                return redirect()->route($this->controllerName . '/manager')->with('my_notify', $notify);
            }
        }  
        
        public function changePassword(MainRequest $request){
            if($request->method() == "POST"){
                $params = $request->all();
                $this->model->saveItem($params, ['task' => 'change-password']);
                return redirect()->route($this->controllerName . '/manager')->with('my_notify', 'Cập nhật thành công!');
            }        
        }

        public function changeStatus(Request $request){
            $params['currentStatus'] = $request->status;
            $params['id'] = $request->id;
            $this->model->saveItem($params, ['task' => 'change-status']);
            return redirect()->route($this->controllerName . '/manager')->with('my_notify', 'Cập nhật thành công!');
        }

        public function delete(Request $request){
            $params['id'] = $request->id;
            $this->model->deleteItems($params, ['task' => 'delete-item']);
            return redirect()->route($this->controllerName . '/manager')->with('my_notify', 'Xoá thành công!');
        }
    }