/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Contenido de las funciones de Rutas privadas
 */
import React from 'react';
import { Route, Redirect } from 'react-router-dom';

/**
 * Componente que se encarga de verificar si el usuario exite
 * para renderizar cualquier componente
 * @param {Object} component componente a renderizar
 */
export const PrivateRoute = ({ component: Component, ...rest }) => (
    // Verifica si existe el usuario si no redirecciona a login
    <Route {...rest} render={props => (
        localStorage.getItem('user')
            ? <Component {...props} />
            : <Redirect to={{ pathname: '/login', state: { from: props.location } }} />
    )} />
)