<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:30',
            'published' => 'required',
            'choice1' => 'required|max:30',
            'choice2' => 'required|max:30',
            'choice3' => 'max:30',
            'choice4' => 'max:30',
            'choice5' => 'max:30',
            'user_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'choice1' => '回答1',
            'choice2' => '回答2',
            'choice3' => '回答3',
            'choice4' => '回答4',
            'choice5' => '回答5',
        ];
    }
}