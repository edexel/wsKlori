/**
 * Created by: Joel Valdivia
 * Date: 05 Jun 2020
 * Description: Componente que contiene el formulario de Login usando react-hooks-form
 */
import React from 'react';
import { useForm } from "react-hook-form";
import InputText from '../../components/InputText';
import Btn from '../../components/Btn';
import RadioGenre from '../../components/RadioGenre';
import { required, emailRequired, emailPattern, passwordRequired, passwordPattern, minLength } from '../../helpers/validationsInputs';
import { Modal, Form, Col, Row } from 'react-bootstrap';


// Componente que contiene el formulario de Login
function UserForm({ onSubmit, data, close, labelButton = 'Aceptar' }) {

    // define caracteristicas de ReacHookForm
    const { register, handleSubmit, errors } = useForm({
        defaultValues: data && {
            username: data['Usuario'],
            email: data['Correo']
        }
    });

    return (
        <Form name="form-calls" onSubmit={handleSubmit(onSubmit)}>
            <Row>
                <Col sm='6' md='6'>
                    {/* BEGIN Input Nombre */}
                    <InputText
                        register={register}
                        name='name'
                        label='Nombre'
                        placeholder='ej. Pedro'
                        errors={errors}
                        rules={{
                            required: required(''),
                            minLength: minLength(2)
                        }}
                    />
                    {/* END Input Nombre */}
                    {/* BEGIN Input Apellido */}
                    <InputText
                        register={register}
                        name='lastname'
                        label='Apellido'
                        placeholder='ej. Padilla'
                        errors={errors}
                        rules={{
                            required: required('')
                        }}
                    />
                    {/* END Input Apellido */}
                    <RadioGenre
                        label={'Género'}
                        register={register}
                        errors={errors}
                        rules={{
                            required: required('')
                        }}
                    />
                    {/* BEGIN Input Apellido */}
                    <InputText
                        register={register}
                        name='size'
                        label='Talla'
                        type='number'
                        step='any'
                        placeholder='ej. 7.2'
                        errors={errors}
                        rules={{
                            required: required('')
                        }}
                    />
                    {/* END Input Apellido */}
                </Col>
                <Col sm='6' md='6'>
                    {/* BEGIN Input Usuario */}
                    <InputText
                        register={register}
                        name='username'
                        label='Usuario con el que entrará el paciente a la App'
                        placeholder='ej. JoseFrank'
                        errors={errors}
                        rules={{
                            required: required(''),
                            minLength: minLength(6)
                        }}
                    />
                    {/* END Input Usuario */}
                    {/* BEGIN Input Correo */}
                    <InputText
                        register={register}
                        name='email'
                        label='Correo'
                        placeholder='ej. juan@gmail.com'
                        errors={errors}
                        rules={{
                            required: required(''),
                            pattern: emailPattern,
                            minLength: minLength(5)
                        }}
                    />
                    {/* END Input Correo */}
                </Col>

            </Row>

            {/* BEGIN Footer Modal con botones */}
            <Modal.Footer>
                <Btn
                    label={'Cancelar'}
                    className={'btn-danger'}
                    onClick={close}
                    icon={true}
                    iconLeft={true}
                    iconClass={'far fa-times-circle'}
                />
                <Btn
                    type="submit"
                    label={labelButton}
                    className={'btn-primary'}
                    icon={true}
                    iconLeft={true}
                    iconClass={'far fa-check-circle'}
                />
            </Modal.Footer>
            {/* END Footer Modal con botones  */}
        </Form >
    );
}
// exporta el componente Formulario de Login
export { UserForm };