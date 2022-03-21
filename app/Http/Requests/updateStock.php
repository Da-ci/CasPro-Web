<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateStock extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required',
            'localisation' => 'required'
        ];
    }
}
