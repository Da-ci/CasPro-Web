<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class displayInfoCommandeMarque extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required',
            'user_id' => 'required'
        ];
    }
}
