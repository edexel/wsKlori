/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Componente principal de la WebApp 
 */
import React from 'react';
import { Router, Route, Switch, Redirect } from 'react-router-dom';

// importa el historial de la App
import { history } from '../helpers/history';
// componente que verifica que el usuario esté autenticado
import { PrivateRoute } from '../routes/PrivateRoute';

// componentes de la App
import { HomePage } from "../pages/home/HomePage";
import { LoginPage } from '../pages/login/LoginPage';

// Componente principal de la WebApp
// Encargara de renderizar los componentes hijos
function App() {

    return (
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
    );
}

// Exporta App
export { App };