<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class displayCommandesMarque extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
