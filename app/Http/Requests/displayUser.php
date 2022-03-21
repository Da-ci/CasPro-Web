<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class displayUser extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
