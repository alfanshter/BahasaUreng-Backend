<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JawabKata extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'jawaban' => [
                'required','array'
            ],
            'jawaban.*' => [
                'required'
            ]
        ];
    }
}
