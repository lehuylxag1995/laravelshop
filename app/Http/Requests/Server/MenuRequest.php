<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Menu;

class MenuRequest extends FormRequest
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
                    'name' => 'bail|required|unique:' . Menu::class . ',name',
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'bail|required|unique:' . Menu::class . ',name',
                ];
                break;
            default:
                return [];
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên menu',
            'name.unique' => 'Vui lòng nhập tên khác'
        ];
    }
}
