<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitRequest extends FormRequest
{
    private $table = "recruit";
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
        $condCompanyName   = '';
        $condUsername   = '';
        $condPassword   = '';
        $condPoundedYear   = '';
        $condCompanySize = '';
        $condAbout      = '';
        $condStatus     = '';
        $condLogo   = '';
        $condPhone = '';
        $condEmail = '';
        $condWebsite = '';
        $condCity = '';
        $condDistrict = '';
        $condWard = '';
        $condAddress = '';
        $condProfession = '';
        $condCoverImage = '';

        switch ($task) {
            case 'add':
                $condUsername       = "bail|required|between:5,100|unique:$this->table,username";
                $condEmail          = "bail|required|email|unique:$this->table,email";
                $condFullname       = "bail|required|min: 5";
                $condCompanyName    = "bail|required|min: 5";
                $condPassword       = "bail|required|between:5,100|confirmed";
                $condStatus         = "bail|in:1,0";
                $condProfession     = "bail|in:1,0";
                break;            
            case "edit-info":
                $condUsername       = "bail|required|between:5,100|unique:$this->table,username";
                $condEmail          = "bail|required|email|unique:$this->table,email";
                $condFullname       = "bail|required|min: 5";
                $condCompanyName    = "bail|required|min: 5";
                $condStatus         = "bail|in:1,0";
                $condProfession     = "bail|in:1,0";
                break;
            case "change-password":
                $condPassword   = "bail|required|between:5,100|confirmed";
                break;
        }
       
        return [
            "username" => $condUsername,
            "email"    => $condEmail,
            "status"   => $condStatus,
            "password" => $condPassword,
            "avatar"   => $condAvatar
        ];
    }

    public function messages(){
        return [
            
        ];
    }

}
