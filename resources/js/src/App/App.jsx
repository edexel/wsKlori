/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Componente principal de la WebApp 
 */
import React from 'react';
import { Router, Route, Switch, Redirect } from 'react-router-dom';
import { Navbar } from "react-bootstrap";
// importa el historial de la App
import { history } from '../helpers/history';
// componente que verifica que el usuario esté autenticado
import { PrivateRoute } from '../routes/PrivateRoute';

import { HomePage } from '../pages/home/HomePage';
import { LoginPage } from '../pages/login/LoginPage';

// Componente principal de la WebApp
// Encargara de renderizar los componentes hijos
function App() {

    return (
        <>
            <Navbar className='nav-bottom-border' bg="light" variant='light' expand="lg">
                <Navbar.Brand href='https://klori.com.mx' target='_blank' >Klori</Navbar.Brand>
            </Navbar>
            <div className="jumbotron">
                <div className="container">
                    <div className="col-md-8 offset-md-2">

                        {/* BEGIN Enrutador de la App */}
                        <Router history={history}>
                            {/* Routas de la App */}
                            <Switch>
                                <PrivateRoute exact path="/" component={HomePage} />
                                <Route path="/login" component={LoginPage} />
                                <Redirect from="*" to="/" />
                            </Switch>
                            {/* Routas de la App */}
                        </Router>
                        {/* END Enrutador de la App */}
                    </div>
                </div>
            </div>
        </>
    );
}

// Exporta App
export { App };