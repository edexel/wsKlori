/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Archivo para componetes sobre la pagina de Login
 */
import React, { useEffect } from 'react';
import { useDispatch } from 'react-redux';
import { LoginForm } from "./LoginForm";
import { loginSuccess, loginRequest, logout } from '../../redux/ducks/loginDucks';

/**
 * Componente que renderiza la Pagina de Login
 * @param {Object} history Propiedad encargada del historial del navegador 
 */
function LoginPage({history}) {
    // disparador de acciones de redux
    const dispatch = useDispatch();

    // Funciona como constructor
    useEffect(() => {
        // dispara la accion de cerrar sesion
        dispatch(logout());
    }, []);
    
    // envía la informacion hacia el servidor para realizar una autenticacion
    const onSubmit = data => {
        // dispara la accion de la peticion Login
        dispatch(loginRequest(data.username))
        // dispara la accion de exito de Login
        dispatch(loginSuccess({username: data.username, token: ''}))
        // redirige hacia el dshboard de la app
        history.push('/')
    }

    return (
        <div className="col-lg-8 offset-lg-2">
            <h2>KALORI</h2>
            {/* Componente de Formulario de Login */}
            <LoginForm onSubmit={onSubmit}/>
        </div>
    );
}

export { LoginPage };