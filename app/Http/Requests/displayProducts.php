<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class displayProducts extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
