<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    private $table = "user";
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

        $condAvatar     = '';
        $condUsername   = '';
        $condEmail      = '';
        $condPassword   = '';
        $condRole      = '';
        $condStatus     = '';
        $condFullname   = '';

        switch ($task) {
            case 'add':
                $condUsername   = "bail|required|between:5,100|unique:$this->table,username";
                $condEmail      = "bail|required|email|unique:$this->table,email";
                $condFullname   = "bail|required|min: 5";
                $condPassword   = "bail|required|between:5,100|confirmed";
                $condStatus     = "bail|in:1,0";
                $condRole      = "bail|in:1,2,3";
                //$condAvatar     = "bail|required|image|max:500";
                break;            
            case "edit-info":
                $condUsername   = "bail|required|between:5,100|unique:$this->table,username,$id";
                $condEmail      = "bail|required|email|unique:$this->table,email,$id";
                $condFullname   = "bail|required|min: 5";
                $condStatus     = "bail|in:1,0";
                $condRole      = "bail|in:1,2,3";
                //$condAvatar     = "bail|image|max:500";
                break;
            case "change-password":
                $condPassword   = "bail|required|between:5,100|confirmed";
                break;    
            case 'change-role':
                $condRole      = "bail|in:1,2,3";
                break;
        }
       
        return [
            "username" => $condUsername,
            "email"    => $condEmail,
            "fullname" => $condFullname,
            "status"   => $condStatus,
            "password" => $condPassword,
            "role"    => $condRole,
            // "avatar"   => $condAvatar
        ];
    }

    public function messages(){
        return [
            
        ];
    }

}
