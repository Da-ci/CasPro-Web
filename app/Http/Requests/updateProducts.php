<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProducts extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required',
            'famille' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'seuil' => 'required',
            'priceGros' => 'required'
        ];
    }
}
