<?php

namespace App\Http\Requests\Server;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'bail|required|unique:' . Category::class . ',name|max:50',
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'bail|required|unique:' . Category::class . ',name|max:50',
                ];
                break;
            default:
                return [];
                break;
        };
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập vào tên menu',
            'name.unique' => 'Tên menu vừa nhập đã tồn tại',
            'name.max' => 'Độ dài tên menu không quá 50 ký tự',
        ];
    }
}
