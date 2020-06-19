<?php


namespace App\Business\DispositivoUsuario;

//Models
use App\Models\DispositivoUsuario;

/**
 * Clase que guarda informacion del dispositivo del usuario
 *
 * Created by Edewaldo Nuñez.
 * Date: 18 Jun 2020
 */
class SaveUserDevice
{


     /**
     *  Guarda informacion del dispositivo de usuario
     *
     * @return \App\Model\DispositivoUsuario
     */
    public function __invoke($device,$idUser)
    {
        $deviceUser = new  DispositivoUsuario();

        $deviceUser->idUsuario  =  $idUser;
        $deviceUser->modelo     =  $device->modelo;
		$deviceUser->plataforma =  $device->plataforma;
		$deviceUser->uuid       =  $device->uuid;
		$deviceUser->codigo     =  $device->codigo;
        $deviceUser->fechaAlta  =  date("Y-m-d H:i:s");
        $deviceUser->created_at  =  date("Y-m-d H:i:s");
        $deviceUser->save();

        return true;
    }
}
