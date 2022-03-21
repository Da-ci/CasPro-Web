<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateLivreur extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required',
            'phone' => 'required'
        ];
    }
}
