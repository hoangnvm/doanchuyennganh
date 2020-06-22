<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class UserModel extends Model
{
    public function __construct(){
        $this->table = 'user';
        $this->folderUpload = 'user';
        $this->fieldSearchAccepted = ['id', 'username', 'email', 'fullname'];
        $this->crudNotAccepted = ['_token', 'avatar_current', 'password_confirmation', 'task'];
    }

    public function listItems($params = null, $option = null){
        $result = null;
        if($option['task'] == 'admin-list-items'){
            $query = $this::select('id', 'username', 'password', 'fullname', 'email', 'gender', 'birthday', 'phone', 'address', 'avatar', 'created', 'role', 'status');
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
        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == '1') ? '0' : '1';
            self::where('id', '=', $params['id'])
                ->update(['status' => $status]);
        }

        if($option['task'] == 'add-item'){      
            $params['created'] = date('Y-m-d');
            if(!empty($params['avatar']))
                $params['avatar'] = $this->uploadThumb($params['avatar']);
            $params['password'] = md5($params['password']);
            self::insert($this->prepareParams($params));
        }

        if($option['task'] == 'edit-item'){
            if(!empty($params['avatar'])){
                self::deleteThumb($params['avatar_current']);
                $params['avatar'] = $this->uploadThumb($params['avatar']);
            }            
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($option['task'] == 'change-role'){
            $role = $params['currentRole'];
            self::where('id', '=', $params['id'])
                ->update(['role' => $role]);
        }

        if($option['task'] == 'change-password'){
            $password = md5($params['password']);
            self::where('id', $params['id'])
                ->update(['password' => $password]);
        }
        if($option['task'] == 'change-role-post'){
            $level = $params['role'];
            self::where('id', '=', $params['id'])
                ->update(['role' => $level]);
        }
    }

    public function deleteItems($params = null, $option = null){
        if($option['task'] == 'delete-item'){
            $item = self::getItem($params, ['task' => 'get-avatar']);
            self::deleteThumb($item['avatar']);
            self::where('id', '=', $params['id'])->delete();
        }
    }

    public function getItem($params = null, $option = null){
        $result = null;
        if($option['task'] == 'get-item'){
            $result = self::select('id', 'username', 'password', 'fullname', 'email', 'gender', 'birthday', 'phone', 'address', 'avatar', 'created', 'role', 'status')-> where('id', $params['id'])->first();
        }

        if($option['task'] == 'get-avatar'){
            $result = self::select('id', 'avatar')-> where('id', $params['id'])->first();
        }

        if($option['task'] == 'auth-login'){
            $result = self::select('id', 'username', 'password', 'fullname', 'email', 'role', 'avatar')
            -> where('status', '1')
            ->where('email', $params['email'])
            ->where('password', md5($params['password']))->first();

            if($result) $result = $result->toArray();
        }
        return $result;
    }
}