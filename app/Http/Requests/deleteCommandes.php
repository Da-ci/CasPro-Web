<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class deleteCommandes extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
