<?php

namespace App\Http\Requests;

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
        return [
            'title' => 'required',
            'description' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле имя нужно заполнить',
            'description.required' => 'Поле имя нужно заполнить',
            'description.min:5' => 'Введите больше 5 символов',
        ];
    }
}
