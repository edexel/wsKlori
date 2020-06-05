/**
 * Created by: Joel Valdivia
 * Date: 05 Jun 2020
 * Description: Componente que contiene el formulario de Login usando react-hooks-form
 */
import React from 'react';
import { useForm } from "react-hook-form";

// Componente que contiene el formulario de Login
function LoginForm({ onSubmit }) {

    // define caracteristicas de ReacHookForm
    const { register, handleSubmit, errors } = useForm();

    return (
        <form name="form" onSubmit={handleSubmit(onSubmit)}>
            {/* BEGIN Input Username */}
            <div className="form-group">
                <label>Username</label>

                <input type="text"
                    name="username"
                    // registra el campo en Form
                    ref={register({ required: true })}
                    // en caso de error agrega la clase is invalid
                    className={'form-control' + (errors.username ? ' is-invalid' : '')}
                />
                {/*  Muestra errores del campo username */}
                { errors.username && <div className="invalid-feedback">username is required</div> }
            </div>
            {/* END Input Username */}

            {/* BEGIN Input Username */}
            <div className="form-group">
                <label>Password</label>
                <input type="password"
                    name="password"
                    // registra el campo en Form
                    ref={register({ required: true })}
                    // en caso de error agrega la clase is invalid
                    className={'form-control' + (errors.password ? ' is-invalid' : '')}
                />
                {/* Muestra errores del campo password */}
                { errors.password && <div className="invalid-feedback">Password is required</div> }
            </div>
            {/* END Input Username */}

            {/* BEGIN Button Entrar de tipo Submit */}
            <div className="form-group">
                <button type="submit" className="btn btn-primary">
                    Entrar
                </button>
            </div>
            {/* END Button Entrar */}
        </form>
    );
}
// exporta el componente Formulario de Login
export { LoginForm };