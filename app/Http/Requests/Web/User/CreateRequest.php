<?php

namespace App\Http\Requests\Web\User;

use App\Http\Requests\ApiFormRequest;

class CreateRequest extends ApiFormRequest
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
            'name' => 'required|string',
            'username' => 'required|string|min:5|unique:usuario',
            'lastname' => 'required|string',
            'birthDate' => 'required|date',
            'email' => 'required|email|unique:usuario',
            'genre' => 'required',
            'occupation' => 'required',
            'idStatusCivil' => 'required',
            'size' => 'required',
            'stature' => 'required',
            'family_background' => 'required',
            'personal_background' => 'required',
            'medicines' => 'required',
            'objective' => 'required',
            'observation' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.min' => 'El nombre debe tener al menos 5 caracteres',
            'username.required' => 'El usuario es requerido',
            'username.string' => 'El usuario debe ser una cadena de texto',
            'username.min' => 'El usuario debe tener al menos 5 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'Debe ser un correo electrpónico',
            'email.unique' => 'El correo electrpónico ya ha sido usado',
            'lastname.required' => 'El apellido es requerido',
            'lastname.string' => 'El apellido debe ser una cadena de texto',
            'birthDate.required' => 'La fecha de nacimiento es requerida',
            'birthDate.date' => 'Debe ser una fecha correcta',
            'civil_status.required' => 'El estado civil es requerido',
        ];
    }
}
