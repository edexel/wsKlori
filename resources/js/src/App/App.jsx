/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Componente principal de la WebApp 
 */
import React from 'react';
import { Router, Route, Switch, Redirect } from 'react-router-dom';
import { Navbar } from "react-bootstrap";
import { Modal, Button, Nav } from "react-bootstrap";

// importa el historial de la App
import { history } from '../helpers/history';
// componente que verifica que el usuario esté autenticado
import { PrivateRoute } from '../routes/PrivateRoute';

import { HomePage } from '../pages/home/HomePage';
import { LoginPage } from '../pages/login/LoginPage';
import { useSelector, useDispatch } from 'react-redux';
import { modalClean } from '../redux/ducks/modalDucks';

import LoadingScreen from 'react-loading-screen';
import { ForgotPage } from '../pages/forgot/ForgotPage';
import { RestorePage } from '../pages/restore/RestorePage';

// Componente principal de la WebApp
// Encargara de renderizar los componentes hijos
function App() {

    // obtiene del store las opciones del modal
    const { modal, loading } = useSelector(store => store);
    const { isAuth, user } = useSelector(store => store.authenticate);
    const dispatch = useDispatch();

    // oculta el modal
    const hideModal = () => {
        // dispara la accion que limpia el modal
        dispatch(modalClean())
    }

    return (
        <>
            <LoadingScreen
                loading={loading.show}
                bgColor='#f1f1f1'
                spinnerColor='#9ee5f8'
                textColor='#676767'
                text={loading.text}
            >
                <Navbar className='nav-bottom-border' bg="light" variant='light' expand="lg">
                    <Navbar.Brand href='https://klori.com.mx' target='_blank' >Klori</Navbar.Brand>
                    <Navbar.Toggle />
                    {
                        isAuth &&
                        <Navbar.Collapse className="justify-content-end">
                            <Navbar.Text>
                                Bienvenido: <b>{user.username}</b>
                            </Navbar.Text>
                            <Nav>
                                <Nav.Link href="/login"><b>Salir</b></Nav.Link>
                            </Nav>
                        </Navbar.Collapse>
                    }
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
                                    <Route path="/forgot" component={ForgotPage} />
                                    <Route path="/res" component={RestorePage} />
                                    <Redirect from="*" to="/" />
                                </Switch>
                                {/* Routas de la App */}
                            </Router>
                            {/* END Enrutador de la App */}
                        </div>
                    </div>
                </div>
                {/* BEGIN Modal global de la APP */}
                <Modal
                    className={modal.className}
                    show={modal.show}
                    backdrop="static"
                    keyboard={false}
                    onHide={hideModal}
                    dialogClassName="modal-90w"
                    size={modal.size}
                    aria-labelledby="example-custom-modal-styling-title"
                >
                    <Modal.Header closeButton>
                        <Modal.Title id="example-custom-modal-styling-title">
                            {modal.title}
                        </Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        {
                            // verifica si tiene body y lo muestra
                            modal.body ?
                                <p className='text-center'>{modal.body}</p>
                                :
                                modal.form ? modal.form : null
                        }
                    </Modal.Body>
                    {
                        // verifica si no tiene form y renderiza el boton de ocultar modal
                        !modal.form ?
                            <Modal.Footer className="modal-footer-close">
                                <Button className="btn bg-red gral-boton" onClick={hideModal}>
                                    Cerrar
                            </Button>
                            </Modal.Footer>
                            :
                            null
                    }
                </Modal>
                {/* END Modal global de la APP */}
            </LoadingScreen>
        </>
    );
}

// Exporta App
export { App };