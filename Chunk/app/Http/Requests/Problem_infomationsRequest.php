<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Problem_infomationsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|min:9',
        ];
    }

    public function messages(){

        return [
            'body.required' => '問題文の入力は必須です',
            'body.min' => ':min 文字以上入力してください',
        ];
    }
}
