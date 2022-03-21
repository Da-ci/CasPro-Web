<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkMaxQuantity extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
