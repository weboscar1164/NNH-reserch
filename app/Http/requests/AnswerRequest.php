<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'comment_body' => 'max:250'
        ];
    }

    public function attributes()
    {
        return [
            'comment_body' => 'コメント'
        ];
    }
}