<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createPdv extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'wilaya' => 'required',
            'commune' => 'required',
            'adresse' => 'required',
        ];
    }
}
