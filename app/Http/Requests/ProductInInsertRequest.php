<?php

namespace CStoke\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInInsertRequest extends FormRequest
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
            'product_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'weight' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'O produto é obrigatório',
            'price.required'      => 'O preço deve ser informado',
            'amount.required'     => 'A quantidade deve ser informada',
            'weight.required'     => 'O peso deve ser informado'
        ];
    }
}