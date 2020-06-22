<?php

namespace App\Http\Models;

use App\Http\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class SavedJobModel extends AdminModel
{
    public function __construct(){
        $this->table = 'saved_job as sj';
        $this->folderUpload = 'job';
        $this->fieldSearchAccepted = ['id', 'title'];
        $this->crudNotAccepted = ['_token', 'avatar_current', 'task', 'logo_current', 'cover_image_current', 'password_confirmation'];
    }

    public function listItems($params = null, $option = null){
        $result = null;        
        if($option['task'] == 'frontend-get-list-item-applied'){

            $result = self::select('j.title as title', 'j.position as position', 'j.post_date as post_date', 'j.expiration_date as expiration_date', 'cpr.status')
                        -> leftJoin('job as j', 'cpr.job_id', '=', 'j.id')
                        -> where('cpr.candidate_id', '=', $params['candidate_id']);

            $result = $result->get()->toArray();
        }

        return $result;
    }
    
    public function saveItem($params = null, $option = null){
        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == '1') ? '0' : '1';
            self::where('rj.id', '=', $params['id'])
                ->update(['rj.status' => $status]);
        }
       
        if($option['task'] == 'add-item'){ 
            $this->table = 'candidate_post_resume';
            self::insert($this->prepareParams($params));
        }

    }

    public function deleteItems($params = null, $option = null){
        $this->table = 'recruit_job';  
        if($option['task'] == 'delete-item'){;
            self::where('id', '=', $params['id'])->delete();
        }
    }

    
}