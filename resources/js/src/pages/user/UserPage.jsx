import React from 'react';
import { useSelector, useDispatch } from 'react-redux';

import DataTable from 'react-data-table-component';
import { LoaderCustom } from '../../components/LoaderCustom';
import { useEffect } from 'react';
import { tableGetAction } from '../../actions/table';
import { TableDinamyc } from '../../components/TableDinamyc';

/**
 * Created by Joel Valdivia
 * Date 16 Jun 2020
 * Description: Componente de Usuarios de la Web App
 */
function UserPage() {

    // obtiene usuario del store
    const dispatch = useDispatch();

    useEffect(() => {
        tableGetAction(dispatch, '/user/paginate')
    }, [])


    /**
     * Abrir modal y llamar el formulario para registrar
     */
    const openModalModify = (e, dataRow) => {
        console.log(e, dataRow)
        /**
         * llamar el formulario a mostrar
         */
        
         /*
         * mostrar el modal con los parametros del formulario
         */
    }

    /**
     * Abrir modal y llamar el formulario para registrar
     */
    const openModalDelete = (e, dataRow) => {
        console.log(e, dataRow)
        /**
         * llamar el formulario a mostrar
         */
        
         /*
         * mostrar el modal con los parametros del formulario
         */
    }
    return (
        <div className="common-container dashboard-container">
            <h1>Usuarios</h1>
            <TableDinamyc 
            theme={'light'}
            noDataLabel={'No existen usuarios registrados'}
            fnModify={openModalModify}
            fnDelete={openModalDelete}
            />
        </div>
    );
}

export { UserPage };