<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createLivreur extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'user_id' => 'required'
        ];
    }
}
