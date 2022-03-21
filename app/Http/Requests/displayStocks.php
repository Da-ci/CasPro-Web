<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class displayStocks extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
