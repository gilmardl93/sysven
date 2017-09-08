<?php

namespace App\Http\Requests\Admin\Inventario;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
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
            'producto'  => 'required',
            'stock'     => 'required',
            'tienda'    => 'required'
        ];
    }
}
