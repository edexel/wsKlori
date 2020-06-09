/**
 * Created by: Joel Valdivia
 * Date: 05 Jun 2020
 * Description: Componente que contiene el formulario de Login usando react-hooks-form
 */
import React from 'react';
import { useForm } from "react-hook-form";
import InputText from '../../components/InputText';
import Btn from '../../components/Btn';

// Componente que contiene el formulario de Login
function LoginForm({ onSubmit }) {

    // define caracteristicas de ReacHookForm
    const { register, handleSubmit, errors } = useForm();

    return (
        <form name="form" onSubmit={handleSubmit(onSubmit)}>
            {/* BEGIN Input Username */}
            <InputText
                register={register}
                name='username'
                // label='Usuario'
                placeholder='usuario'
                errors={errors}
                rules={{required: true}}
                message='Usuario es requerido'
            />
            {/* END Input Username */}

            {/* BEGIN Input Password */}
            <InputText
                register={register}
                name='password'
                type="password"
                // label='Contraseña'
                placeholder='contraseña'
                errors={errors}
                rules={{required: true}}
                message='Contraseña es requerida'
            />
            {/* END Input Password */}

            {/* BEGIN Button Entrar de tipo Submit */}
            <Btn
                type="submit" 
                label={'Entrar'} 
                className={'btn-primary'}
                icon={true}
                iconLeft={true}
                iconClass={'fa fa-sign-in-alt'}
            />
            {/* END Button Entrar */}
        </form>
    );
}
// exporta el componente Formulario de Login
export { LoginForm };