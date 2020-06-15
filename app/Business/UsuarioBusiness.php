<?php

namespace App\Business;

// Facades
use App\Models\Usuario;
// Utils
use App\Utils\JwtToken;

//Models

/**
 * Clase de negocios del usuario
 *
 * Created by Edewaldo Nuñez.
 * Date: 15 Jun 2020
 */
class UsuarioBusiness
{
    public static function fnLoginUser($request)
    {

        // Encuentra usuario de la base de datos
        $user = Usuario::where('email', $request->input('username'))->first();

        //verifica si el usuario existe con email
        if (!$user)
            $user = Usuario::where('username', $request->input('username'))->first();
        

        // verifica si el usuario existe sino responde con error
        if (!$user) 
            return false;
        

        // Verifica la contraseña y genera un token sino responde con error
        if (!Hash::check($request->input('password'), $user->password)) 
            return false;
        

        // Se actualiza la última vez que inició sesión el usuario
        $user->lastSession = date("Y-m-d H:i:s");
        $user->save();

        // El usuario es válido. se asigna a el resultado el token.
        $user['token'] = JwtToken::create($user);

        return $user;
    }
}
