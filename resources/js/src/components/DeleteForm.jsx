import React from 'react';
import { Modal, Button } from "react-bootstrap";
import { useForm } from 'react-hook-form';
import { useEffect } from 'react';

function DeleteForm({onSubmit, message, id, close, labelButton='Aceptar'}) {
    
    const { handleSubmit, register, setValue } = useForm();

    useEffect(() => {
        register({ name: 'id' });
        setValue("id", id)
      }, [register])

    return (
        <form onSubmit={handleSubmit(onSubmit)} className='form-horizontal modal-bottom' >
            <p className='text-center'>{message}</p>
            <Modal.Footer>
                <Button variant="secondary" className="gral-boton" onClick={close}>
                    <i className="far fa-times-circle icon-btn"></i>Cancelar
                    </Button>
                <Button type="submit" className="gral-boton" variant='danger'><i className="far fa-check-circle icon-btn"></i>{labelButton}</Button>
            </Modal.Footer>
        </form>
    )
}


export { DeleteForm };