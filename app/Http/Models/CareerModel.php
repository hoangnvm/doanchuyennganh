<?php

namespace App\Http\Models;

use App\Http\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class CareerModel extends AdminModel
{
    public function __construct(){
        $this->table = 'career';
    }

    public function listItems($params = null, $option = null){
        $result = null;
        if($option['task'] == 'frontend-list-items'){
            $query = $this::select('id', 'name');           
            $result = $query->get()->toArray();
        }
        return $result;
        
    }


}