<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommunityPost extends FormRequest
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
            'president_id' => 'required|exists:community_type,id'
        ];
    }

    public function messages()
    {
        return [
            'president_id.required' => '该用户不存在',
            'president_id.exists' => '该用户不存在',
        ];
    }
}
