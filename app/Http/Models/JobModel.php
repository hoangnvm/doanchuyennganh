<?php

namespace App\Http\Models;

use App\Http\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class JobModel extends AdminModel
{
    public function __construct(){
        $this->table = 'job as j';
        $this->folderUpload = 'job';
        $this->fieldSearchAccepted = ['id', 'title'];
        $this->crudNotAccepted = ['_token', 'avatar_current', 'task', 'logo_current', 'cover_image_current', 'password_confirmation'];
    }

    public function listItems($params = null, $option = null){
        $result = null;
        if($option['task'] == 'admin-list-items'){
            $query = $this::select('id', 'title', 'post_date', 'expiration_date', 'recruit_id', 'type', 'status');
            if($params['filter']['status'] != 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }                
            if(@$params['search']['value'] != ''){
                if(@$params['search']['field'] == 'all'){

                    $query->where(function($query) use($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }                        
                    });
                    
                }else if(in_array($params['search']['field'], $this->fieldSearchAccepted)){
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }  
            $result = $query->orderBy('id', 'DESC')           
                ->paginate($params['pagination']['totalItemsPerPage']);
        }
        
        // 
        if($option['task'] == 'frontend-list-items-in-career'){
            $result = self::select('j.id', 'j.title', 'j.amount', 'j.post_date', 'j.expiration_date', 'j.status', 'j.recruit_id', 'w.name as work_type', 'ci.name as city_name', 'j.count');
            if(@$params['search']['value'] != ''){
                $result->where('title', 'LIKE', "%{$params['search']['value']}%");
            }  
            $result-> leftJoin('city as ci', 'j.city_id', '=', 'ci.id') 
                -> leftJoin('work_type as w', 'j.work_type_id', '=', 'w.id')
                -> where('career_id', $params['career_id'])
                ->limit(5); 

            $result = $result->get()->toArray();
        }

        if($option['task'] == 'frontend-list-items'){
            $result = self::select('j.id', 'j.title', 'j.amount', 'j.post_date', 'j.expiration_date', 'j.status', 'j.recruit_id', 'w.name as work_type', 'ci.name as city_name', 'j.count');
            if(@$params['search']['value'] != ''){
                $result->where('title', 'LIKE', "%{$params['search']['value']}%");
            }  
            $result-> leftJoin('city as ci', 'j.city_id', '=', 'ci.id') 
                -> leftJoin('work_type as w', 'j.work_type_id', '=', 'w.id')
                ->limit(5); 

            $result = $result->get()->toArray();
        }

        if($option['task'] == 'frontend-manager-list-items'){
            $result = self::select('j.id', 'j.title', 'j.amount', 'j.post_date', 'j.expiration_date', 'j.status', 'j.recruit_id', 'w.name as work_type', 'ci.name as city_name', 'j.count')
                            -> leftJoin('city as ci', 'j.city_id', '=', 'ci.id') 
                            -> leftJoin('work_type as w', 'j.work_type_id', '=', 'w.id')
                            ->where('j.recruit_id', $params['recruit_id'])
                            ->limit(5); 

            $result = $result->get()->toArray();
        }
        return $result;
        
    }

    public function countItems($params = null, $option = null){
        $result = null;
        if($option['task'] == 'admin-count-items-group-by-status'){
            $query = self::groupBy('status')
                        ->select(DB::raw('count(id) as count, status'));
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
        $this->table = 'job';
        if($option['task'] == 'add-item'){              
            self::insert($this->prepareParams($params));
        }

        if($option['task'] == 'edit-item'){   
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == '1') ? '0' : '1';
            self::where('id', '=', $params['id'])
                ->update(['status' => $status]);
        }

        if($option['task'] == 'change-type'){
            $type = ($params['currentType'] == '1') ? '1' : '0';
            self::where('id', '=', $params['id'])
                ->update(['type' => $type]);
        }
    }

    public function getItem($params = null, $option = null){
        $result = null;
        if($option['task'] == 'get-item'){
            $result = self::select('id', 'title', 'position', 'address', 'amount', 'description', 'required', 'benefit', 'work_place', 'post_date', 'expiration_date', 'email_contact', 'name_contact', 'phone_contact', 'gender', 'status', 'type', 'salary_id', 'experience_id', 'recruit_id', 'city_id', 'district_id', 'ward_id', 'career_id', 'level_id', 'work_type_id', 'count')-> where('id', $params['id'])->first()->toArray();
        }

        if($option['task'] == 'get-item-featured'){
            $result = self::select('j.id', 'j.title', 'ci.name as city_name', 'w.name as work_type')
            -> leftJoin('city as ci', 'j.city_id', '=', 'ci.id') 
            -> leftJoin('work_type as w', 'j.work_type_id', '=', 'w.id')
            -> where('type', '1')
            -> where('status', '1')
            ->get()->toArray();
        }

        if($option['task'] == 'get-item-frontend'){
            $result = self::select('j.id', 'j.title', 'j.position', 'j.address', 'j.amount', 'j.description', 'j.required', 'j.benefit', 'j.work_place', 'j.post_date', 'j.expiration_date', 'j.email_contact', 'j.name_contact', 'j.phone_contact', 'j.gender', 'j.status', 'j.type', 's.name as salary', 'e.name as experience', 'recruit_id', 'city_id', 'district_id', 'ward_id', 'career_id', 'l.name as level', 'w.name as work_type', 'j.count')
            -> leftJoin('salary as s', 'j.salary_id', '=', 's.id')
            -> leftJoin('work_type as w', 'j.work_type_id', '=', 'w.id')
            -> leftJoin('experience as e', 'j.experience_id', '=', 'e.id')
            -> leftJoin('level as l', 'j.level_id', '=', 'l.id')
            -> where('j.id', $params['id'])->first()->toArray();
        }

        if($option['task'] == 'frontend-get-item-job'){
            $result = self::select('id as job_id', 'recruit_id')
            -> where('id', $params['job_id'])->get();
            if($result) $result = $result->toArray();
        }

        return $result;
    }

    public function deleteItems($params = null, $option = null){
        $this->table = 'job';
        if($option['task'] == 'delete-item'){
            self::where('id', '=', $params['id'])->delete();
        }

        if($option['task'] == 'delete-job-frontend'){
            self::where('id', '=', $params['id'])->delete();
        }
    }

}