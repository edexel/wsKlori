import React from 'react';
import { useSelector, useDispatch } from 'react-redux';

import DataTable from 'react-data-table-component';
import { LoaderCustom } from '../../components/LoaderCustom';
import { useEffect } from 'react';
import { tableGetAction } from '../../actions/table';
import { TableDinamyc } from '../../components/TableDinamyc';
import { DeleteForm } from '../../components/DeleteForm';
import { modalForm, modalClean } from '../../redux/ducks/modalDucks';
import { UserForm } from './UserForm';
import Btn from '../../components/Btn';

/**
 * Created by Joel Valdivia
 * Date 16 Jun 2020
 * Description: Componente de Usuarios de la Web App
 */
function UserPage() {

    // obtiene usuario del store
    const dispatch = useDispatch();
    const API_URL = '/user/paginate';


    useEffect(() => {
        tableGetAction(dispatch, API_URL)
    }, [])

    /**
    * Abrir modal dependiendo la accion
    */
    const openModal = (e, dataRow, action) => {
        switch (action) {
            case 'modify':
                openModalModify(dataRow)
                break;
            case 'delete':
                openModalDelete(dataRow)
                break;
        }
    }

    /**
    * Cerrar cualquier modal que este activo
    */
    const closeModal = () => {
        dispatch(modalClean())
    }

    /**
   * Funcion para registrar haciendo peticion Http
   * @param datosFormulario
   */
    const register = (dataForm) => {
        console.log('register', dataForm)
        // const paginacion = '?page=' + this.props.paginacion.actual_pagina;
        // this.props.dispatch(catalogoAcciones.modificar(datosFormulario.id, datosFormulario, this.state.url, paginacion))
    }
    /**
    * Funcion para modificar los registros del catalogo
    * @param datosFormulario
    * @param url
    */
    const modify = (dataForm, url) => {
        console.log('modify', dataForm)
        // const paginacion = '?page=' + this.props.paginacion.actual_pagina;
        // this.props.dispatch(catalogoAcciones.modificar(datosFormulario.id, datosFormulario, this.state.url, paginacion))
    }

    /**
     * Funcion para eliminar haciendo peticion Http
     */
    const del = (dataForm) => {
        console.log('delete', dataForm)
    }

    /**
   * Abrir modal y llamar el formulario para registrar
   */
    const openModalRegister = () => {
        const size = 'lg';
        const title = 'Registrando usuario';
        const form = <UserForm
            close={closeModal}
            onSubmit={register}
        />;

        dispatch(modalForm({ title, campos: form, size }))
    }

    /**
     * Abrir modal y llamar el formulario para registrar
     */
    const openModalModify = (dataRow) => {
        console.log('modificar', dataRow)
        const size = 'lg';
        const title = `Modificando usuario ${dataRow.Usuario}`;
        const form = <UserForm
            data={dataRow}
            close={closeModal}
            onSubmit={modify}
        />
        dispatch(modalForm({ title, campos: form, size }))
    }

    /**
     * Abrir modal y llamar el formulario para eliminar
     */
    const openModalDelete = (dataRow) => {
        const size = 'md';
        const title = 'Eliminando usuario';
        const form = <DeleteForm
            id={dataRow.idUsuario}
            close={closeModal}
            message={`¿Seguro que quieres eliminar el Registro "${dataRow.Usuario}"?`}
            onSubmit={del}
            data={dataRow}
        />;
        dispatch(modalForm({ title, campos: form, size }))

    }
    return (
        <div className="common-container dashboard-container">
            <h1>Usuarios</h1>
            <Btn
                label={'Crear'}
                onClick={openModalRegister}
            />
            <TableDinamyc
                theme={'light'}
                noDataLabel={'No existen usuarios registrados'}
                openModal={openModal}

            />
        </div>
    );
}

export { UserPage };