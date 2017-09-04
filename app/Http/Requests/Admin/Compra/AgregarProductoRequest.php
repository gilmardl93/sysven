<?php

namespace App\Http\Requests\Admin\Compra;

use Illuminate\Foundation\Http\FormRequest;

class AgregarProductoRequest extends FormRequest
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
            'producto' => 'required',
            'cantidad' => 'required',
            'precio_unitario' => 'required'
        ];
    }
}
