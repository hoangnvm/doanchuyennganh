<?php
namespace App\Helpers;
use Illuminate\Support\Str;
    
class URL{

    public static function jobURL($id){
        return route('job/single-job', ['id' => $id]);
    }   
    
    public static function appliedJobURL($id){
        return route('candidate/applied-job', ['id' => $id]);
    }   
}