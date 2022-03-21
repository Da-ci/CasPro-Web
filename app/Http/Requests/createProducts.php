<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createProducts extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'famille' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'seuil' => 'required',
            'prixGros' => 'required',
            'user_id' => 'required'
        ];
    }
}
