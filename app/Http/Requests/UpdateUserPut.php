<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPut extends FormRequest
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
            'email' => 'required|unique:tripulantes,email,' . Auth::user()->id,
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ];
    }
}
