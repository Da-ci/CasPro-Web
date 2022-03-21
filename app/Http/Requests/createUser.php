<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUser extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required'
        ];
    }
}
