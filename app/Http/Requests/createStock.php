<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createStock extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'localisation' => 'required',
            'user_id' => 'required'
        ];
    }
}
