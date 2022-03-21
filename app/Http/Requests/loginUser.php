<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginUser extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
