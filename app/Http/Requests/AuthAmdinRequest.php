<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthAmdinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function registerAdminRules()
    {
        return [
            'com_name' => ['required', 'string', 'max:255'],
            'com_email' => ['required', 'string', 'email', 'max:255','unique:organization_gen_infos,email'],
            'com_password' => 'required',
            'password_confirmation' => 'required|same:com_password',
            'term-2' =>'required'
        ];
    }
}
