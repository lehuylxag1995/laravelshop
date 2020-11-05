<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryPost extends FormRequest
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
            'name' => 'bail|required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập vào tên menu',
            'name.max' => 'Độ dài tên menu không quá 50 ký tự',
        ];
    }
}
