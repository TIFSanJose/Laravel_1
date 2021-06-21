<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            // Validaciones
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required' => 'Debe ingresar una descripcion del curso'
        ];
    }

    public function attributes()
    {
        return[
            'nombre' => 'nombre del curso'
        ];
    }
}
