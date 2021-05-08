<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'article_id' => 'required',
            'comment' => 'required | max:50'
        ];
    }

    public function message() 
    {
        return [
            'comment.max' => 'コメントは50文字以内で入力してください'
        ];
    }
}