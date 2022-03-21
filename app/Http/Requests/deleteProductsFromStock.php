<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class deleteProductsFromStock extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required',
            'stock_id' => 'required'
        ];
    }
}
