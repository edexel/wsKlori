<?php

namespace App\Http\Requests\Web\User;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends ApiFormRequest
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
            'id' => 'required|numeric',
            'name' => 'required|string',
            'username' => ['required', 'string', 'min:5', Rule::unique('usuario')->ignore($this->username, 'username')],
            'email' => ['required', 'email', Rule::unique('usuario')->ignore($this->id, 'idUsuario')],
            'lastname' => 'required|string',
            'birthDate' => 'required|date',
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
            'id.required' => 'El id es requerido',
            'id.numeric' => 'El id debe ser numérico',
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.min' => 'El nombre debe tener al menos 5 caracteres',
            'username.required' => 'El usuario es requerido',
            'username.string' => 'El usuario debe ser una cadena de texto',
            'username.min' => 'El usuario debe tener al menos 5 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'Debe ser un correo electrpónico',
            'email.unique' => 'El correo electrpónico ya ha sido usado, utilice otro',
            'lastname.required' => 'El apellido es requerido',
            'lastname.string' => 'El apellido debe ser una cadena de texto',
            'birthDate.required' => 'La fecha de nacimiento es requerida',
            'birthDate.date' => 'Debe ser una fecha correcta',
            'civil_status.required' => 'El estado civil es requerido',
        ];
    }
}
