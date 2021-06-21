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
            'name' => 'required',
            'description' => 'required',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Debe ingresar una descripcion del curso'
        ];
    }

    public function attributes()
    {
        return[
            'name' => 'nombre del curso'
        ];
    }
}
