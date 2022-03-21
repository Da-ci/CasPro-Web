<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class deleteProducts extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
