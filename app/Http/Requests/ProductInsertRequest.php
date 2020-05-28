<?php

namespace CStoke\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInsertRequest extends FormRequest
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
            'name' => 'required',
            'model' => 'required',
            'category_id' => 'required',
            'manufacturer_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do produto é obrigatório',
            'model.required'  => 'O modelo do produto é obrigatório',
            'category_id.required'  => 'A categoria do produto é obrigatório',
            'manufacturer_id.required' => 'O fabricante é obrigatório'
        ];
    }
}