<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class AdminModel extends Model
{
    public $timestamps = false;    
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = '';
    protected $folderUpload = '';
    
    protected $fieldSearchAccepted = [
        'id',
        'name'
    ];

    protected $crudNotAccepted     = [
        '_token',
        'avatar_current',
        'logo_current',
        'cover_image_current'
    ];

    public function deleteThumb($thumbName){
        Storage::disk('my_storage_image')->delete($this->folderUpload. '/' .$thumbName);
    }

    public function uploadThumb($thumbObj){
        $thumbName =  Str::random(7) . '.' . $thumbObj->clientExtension();   
        $thumbObj->storeAs($this->folderUpload, $thumbName , 'my_storage_image');
        return $thumbName;
    }

    public function prepareParams($params){
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }
}