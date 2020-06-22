<?php

namespace App\Http\Models;

use App\Http\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class RecruitModel extends AdminModel
{
    public function __construct(){
        $this->table = 'recruit';
        $this->folderUpload = 'recruit';
        $this->fieldSearchAccepted = ['id', 'username'];
        $this->crudNotAccepted = ['_token', 'avatar_current', 'task', 'logo_current', 'cover_image_current', 'password_confirmation'];
    }

    public function listItems($params = null, $option = null){
        $result = null;
        if($option['task'] == 'admin-list-items'){
            $query = $this::select('id', 'username','email', 'company_name', 'register_date', 'status');
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

        if($option['task'] == 'add-item'){    
            $this->table = 'recruit';
            $params['register_date'] = date('Y-m-d');
            if(!empty($params['avatar']))
                $params['avatar'] = $this->uploadThumb($params['avatar']);
            if(!empty($params['logo']))
                $params['logo'] = $this->uploadThumb($params['logo']);
            if(!empty($params['cover_image']))
                $params['cover_image'] = $this->uploadThumb($params['cover_image']);
            $params['password'] = md5($params['password']);
            self::insert($this->prepareParams($params));
        }

        if($option['task'] == 'edit-item'){
            if(!empty($params['avatar']) || !empty($params['logo']) || !empty($params['cover_image'])){
                self::deleteThumb($params['cover_image_current']);
                self::deleteThumb($params['logo']);
                $params['cover_image'] = $this->uploadThumb($params['cover_image']);
                $params['logo'] = $this->uploadThumb($params['logo']);
            }     
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($option['task'] == 'change-password'){
            $password = md5($params['password']);
            self::where('id', $params['id'])
                ->update(['password' => $password]);
        }

        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == '1') ? '0' : '1';
            self::where('id', '=', $params['id'])
                ->update(['status' => $status]);
        }
    }

    public function getItem($params = null, $option = null){
        $result = null;
        if($option['task'] == 'get-item'){
            $result = self::select('id', 'username', 'password', 'email', 'company_name', 'about', 'logo', 'address', 'phone', 'register_date', 'status', 'website', 'city_id', 'district_id', 'ward_id', 'founded_year', 'company_size_id', 'career_id', 'cover_image', 'avatar')-> where('id', $params['id'])->first();
        }

        if($option['task'] == 'get-avatar'){
            $result = self::select('id', 'avatar')-> where('id', $params['id'])->first();
        }

        if($option['task'] == 'get-logo'){
            $result = self::select('id', 'logo')-> where('id', $params['id'])->first();
        }

        if($option['task'] == 'get-cover-image'){
            $result = self::select('id', 'cover_image')-> where('id', $params['id'])->first();
        }

        if($option['task'] == 'recruit-login'){
            $result = self::select('id', 'username', 'company_name', 'email', 'logo')
            -> where('status', '1')
            ->where('email', $params['email'])
            ->where('password', md5($params['password']))->first();

            if($result) $result = $result->toArray();
        }

        if($option['task'] == 'frontend-get-item'){
            $result = self::select('id', 'username', 'password', 'company_name', 'email', 'company_name', 'about', 'logo', 'address', 'phone', 'register_date', 'status', 'website', 'city_id', 'district_id', 'ward_id', 'founded_year', 'company_size_id', 'career_id', 'cover_image', 'avatar')-> where('id', $params['id'])->first();
            if($result) $result = $result->toArray();
        }
        
        return $result;
    }

    public function deleteItems($params = null, $option = null){
        if($option['task'] == 'delete-item'){
                if(!empty($params['avatar']) || !empty($params['logo']) || !empty($params['cover_image'])){
                $item = self::getItem($params, ['task' => 'get-avatar']);
                self::deleteThumb($item['avatar']);
                $item = self::getItem($params, ['task' => 'get-logo']);
                self::deleteThumb($item['logo']);
                $item = self::getItem($params, ['task' => 'get-cover_image']);
                self::deleteThumb($item['cover_image']);
            }
            self::where('id', '=', $params['id'])->delete();
        }
    }

}