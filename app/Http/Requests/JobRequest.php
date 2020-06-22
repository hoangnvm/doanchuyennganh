<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    private $table = "job";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id     = $this->id;
        $task   = $this->task;

        $condTitle     = '';
        $condStatus     = '';
        $condPhone = '';
        $condEmail = '';
        $condCity = '';
        $condDistrict = '';
        $condWard = '';
        $condAddress = '';
        $condProfession = '';

        switch ($task) {
            case 'add':
                $condStatus         = "bail|in:1,0";
                $condProfession     = "bail|in:1,0";
                break;            
            case "edit-info":
                $condUsername       = "bail|required|between:5,100|unique:$this->table,username";
                $condEmail          = "bail|required|email|unique:$this->table,email";
                $condStatus         = "bail|in:1,0";
                $condProfession     = "bail|in:1,0";
                break;
        }
       
        return [
        ];
    }

    public function messages(){
        return [
            
        ];
    }

}
