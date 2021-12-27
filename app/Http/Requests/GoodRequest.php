<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
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
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле название нужно заполнить',
            'description.required' => 'Поле описание нужно заполнить',
            'category_id.required' => 'Поле id категории сообщения нужно заполнить',
            'price.required' => 'Поле цена нужно заполнить',
        ];
    }
}
