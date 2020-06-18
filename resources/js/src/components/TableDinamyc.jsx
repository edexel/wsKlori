import React from 'react';
import { Table } from "./Table";
import { useSelector } from 'react-redux';
import { useEffect } from 'react';
import { useState } from 'react';
import { Button, Col, Form } from "react-bootstrap";

/**
 * Created by Joel Valdivia
 * Date 16 Jun 2020
 * Funcion para tabla dinámica en todos los cruds
 * @param {Function} fnModify Funcion para abrir el modal de modificar
 * @param {Function} fnDelete Funcion para abrir el modal de eliminar
 */
function TableDinamyc({ fnModify, fnDelete, title = '', theme = '', noDataLabel }) {

    const { table } = useSelector(store => store);
    const { paginate, columns } = table;
    const { data, total, per_page } = paginate;

    const [isColumns, setIsColumns] = useState(false)

    // detecta cambios en la variable columnas
    useEffect(() => {
        // en caso de detectar un cambio en las columnas
        // verifica si contienen columnas
        if (columns.length > 0) {
            // indica que se pueden generar las columnas
            setIsColumns(true)
        }
    }, [columns])

    /**
     * Contruye columna de una variable string "Nombre de la columna"
     * @param {String} column String de columna
     */
    const createColumnText = (column) => {
        return {
            name: column,
            selector: column,
            sortable: true,
            cell: (row) => (
                <>
                    {/* <span className="col-cabecera" >{column}: </span> */}
                    {row[column]}
                </>
            )
        }
    }

    /**
     * Construye columna de una variable objeto
     * @param {Object} column Objeto de columna
     */
    const createColumnObject = (column) => {

        const name = column.name;
        const integer = column.type === 'int';
        const datestring = column.type === 'date';

        return {
            name: name,
            selector: name,
            sortable: true,
            center: integer,
            right: datestring,
            cell: (row) => (
                <>
                    {/* <span className="col-cabecera" >{name}: </span> */}
                    {row[name]}
                </>
            )
        };
    }

    /**
     * Construye columna de una variable objeto
     * @param {Object} column Objeto de columna
     */
    const createColumnActions = (mod, del) => {
        const center = true;
        const button = true;
        const ignoreRowClick = true;

        return {
            name: 'Acciones',
            center: center,
            button: button,
            ignoreRowClick: ignoreRowClick,
            cell: (row) =>
                <Form className='form-btn'>
                    <Form.Row>
                        {
                            mod &&
                            <>
                                <Col className='cuadroboton'>
                                    <Button
                                        title='Modificar'
                                        className='ml-auto bg-yellow'
                                        onClick={(e) => mod(e, row)}
                                        data-toggle='tooltip'
                                        data-placement='top'>
                                        <i className="fa fa-edit"> </i>
                                    </Button>
                                </Col>
                            </>
                        }
                        {
                            del &&
                            <>
                                <Col className='cuadroboton'>
                                    <Button
                                        title='Eliminar'
                                        onClick={(e) => del(e, row)}
                                        className='ml-auto btn-danger'
                                        data-toggle='tooltip'
                                        data-placement='top'>
                                        <i className="fa fa-trash"> </i>
                                    </Button>
                                </Col>
                            </>
                        }
                    </Form.Row>
                </Form>
        }
    }

    /**
     * crear las columnas de la tabla asi como los botones de las funciones de las acciones
     * @param modificar
     * @param eliminar
     * @returns {*[]}
     */
    const generateColumns = (modified, deleted) => {

        let columnsGenerated = [];
        // recorre las columnas
        columns.map((column, index) => {
            // verifica que no sea la columna id 
            if (index !== 0) {
                let columnCreate = null;
                // verifica si es un objeto la columna
                if (typeof columna === 'object') {
                    // en caso de ser objeto crea su columna
                    columnCreate = createColumnObject(column);
                } else {
                    // en caso de no ser objeto crea con Texto
                    columnCreate = createColumnText(column);
                }
                // agrega cada columna creada
                columnsGenerated.push(columnCreate)
            }
        })
        // crea columna con acciones
        const columnActions = createColumnActions(modified, deleted)
        // agrega la columna de acciones a las columnas
        columnsGenerated.push(columnActions)

        return columnsGenerated;
    }

    /**
    * Funcion que obtiene el numero de página al cambiar en la paginacion
    * @param {Number} page Número de página
    */
    const changePage = (page) => {
        // url de pagina
        const url = `${paginate.path}?page=${page}`;
        // dispara la accion para obtener la informacion de la paginacion
        tableGetAction(dispatch, url)
    }

    return (
        <Table
            className={'table'}
            title={title}
            theme={theme}
            columns={isColumns ? generateColumns(fnModify, fnDelete) : []}
            data={data}
            noDataLabel={noDataLabel}
            onChangePage={changePage}
            isPagination={true}
            total={total}
            registerPerPage={per_page}
        />
    )
}

export { TableDinamyc }