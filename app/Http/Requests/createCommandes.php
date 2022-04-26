<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createCommandes extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required',
            'pdv_id' => 'required'
        ];
    }
}
