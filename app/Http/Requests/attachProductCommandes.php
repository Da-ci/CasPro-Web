<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class attachProductCommandes extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ];
    }
}
