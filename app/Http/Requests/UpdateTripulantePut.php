<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTripulantePut extends FormRequest
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
            'apellidos' => 'required',
            'id_rol' => 'required',
            'id_sector' => 'required',
            'email' => 'required|unique:tripulantes,email,' . $this->route('tripulante')->id,
        ];
    }
}
