<?php

namespace App\Http\Models;

use App\Http\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class AppliedJobModel extends AdminModel
{
    public function __construct(){
        $this->table = 'candidate_post_resume as cpr';
        $this->folderUpload = 'job';
        $this->fieldSearchAccepted = ['id', 'title'];
        $this->crudNotAccepted = ['_token', 'avatar_current', 'task', 'logo_current', 'cover_image_current', 'password_confirmation'];
    }

    public function listItems($params = null, $option = null){
        $result = null;
        if($option['task'] == 'admin-list-items'){

            $query = $this::select('cpr.id', 'cpr.candidate_id', 'cpr.job_id', 'cpr.post_date', 'cpr.status');
            if($params['filter']['status'] != 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }                
            if($params['search']['value'] != ''){
                if($params['search']['field'] == 'all'){

                    $query->where(function($query) use($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }                        
                    });
                    
                }else if(in_array($params['search']['field'], $this->fieldSearchAccepted)){
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }  
            $result = $query->orderBy('rj.id', 'DESC')                            
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        
        if($option['task'] == 'frontend-get-list-item-applied'){

            $result = self::select('cpr.job_id', 'j.title as title', 'j.position as position', 'j.post_date as post_date', 'j.expiration_date as expiration_date', 'cpr.status')
                        -> leftJoin('job as j', 'cpr.job_id', '=', 'j.id')
                        -> where('cpr.candidate_id', '=', $params['candidate_id']);

            $result = $result->get()->toArray();
        }

        if($option['task'] == 'frontend-get-list-item-candidate'){
            $result = self::select('cpr.id', 'cpr.candidate_id', 'c.fullname as name', 'j.position as position', 'cpr.status')
                        -> leftJoin('candidate as c', 'cpr.candidate_id', '=', 'c.id')
                        -> leftJoin('recruit as r', 'cpr.recruit_id', '=', 'r.id')
                        -> leftJoin('job as j', 'cpr.job_id', '=', 'j.id')
                        -> where('r.id', $params['id']);

            $result = $result->get()->toArray();
        }

        return $result;
    }

    public function countItems($params = null, $option = null){
        $result = null;
        if($option['task'] == 'admin-count-items-group-by-status'){
            $query = self::groupBy('status')
                        ->select(DB::raw('count(id) as count, rj.status'));
            if($params['search']['value'] != ''){
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }                        
                    });
                    
                }else if(in_array($params['search']['field'], $this->fieldSearchAccepted)){
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            } 
            $result = $query->get()->toArray();
        }
        return $result;
    }

    public function saveItem($params = null, $option = null){
        $this->table = 'candidate_post_resume';
        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == '1') ? '0' : '1';
            self::where('id', '=', $params['id'])
                ->update(['status' => $status]);
        }
       
        if($option['task'] == 'add-item'){ 
            self::insert($this->prepareParams($params));
        }

        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == '1') ? '0' : '1';
            self::where('id', '=', $params['id'])
                ->update(['status' => $status]);
        }

    }

    public function deleteItems($params = null, $option = null){
        $this->table = 'candidate_post_resume';
        if($option['task'] == 'delete-item'){;
            self::where('id', '=', $params['id'])->delete();
        }
        if($option['task'] == 'delete-candidate-applied-job'){;
            self::where('id', '=', $params['id'])->delete();
        }
    }

    public function getItem($params = null, $option = null){
        $result = null;
        if($option['task'] == 'get-item'){
            $result = self::select('rj.id', 'rj.title', 'rj.position', 'rj.address', 'rj.amount', 'rj.description', 'rj.required', 'rj.benefit', 'rj.work_place', 'rj.post_date', 'rj.expiration_date', 'rj.email_contact', 'rj.name_contact', 'rj.phone_contact', 'rj.gender', 'rj.status', 'rj.type', 'rj.salary_id', 'rj.experience_id', 'rj.recruit_id', 'rj.city_id', 'rj.district_id', 'rj.ward_id', 'rj.profession_id', 'rj.level_id', 'rj.work_type_id', 'rj.count')-> where('id', $params['id'])->first();
            if($result) $result = $result->toArray();
        }

        if($option['task'] == 'auth-login'){
            $result = self::select('id', 'username', 'password', 'fullname', 'email', 'role', 'avatar')
            ->where('rj.status', '1')
            ->where('rj.email', $params['email'])
            ->where('rj.password', md5($params['password']))->first();

            if($result) $result = $result->toArray();
        }

        if($option['task'] == 'frontend-get-item'){
            $result = self::select('rj.id', 'rj.title', 'rj.amount', 'rj.post_date', 'rj.expiration_date', 'rj.status', 'rj.recruit_id', 'ci.name as city_name', 'rj.count')
            -> leftJoin('city as ci', 'rj.city_id', '=', 'ci.id') 
            -> where('rj.recruit_id', $params['id'])->get();
            if($result) $result = $result->toArray();
        }

        return $result;
    }
}