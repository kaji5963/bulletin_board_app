<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max: 50'],
            'content' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title' => 'titleは必須項目かつ50文字までです',
            'content' => 'contentは必須項目です',
        ];
    }
}
