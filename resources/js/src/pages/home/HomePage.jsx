import React from 'react';
import { Link } from 'react-router-dom';
import { useSelector, useDispatch } from 'react-redux';
import Calendar from 'react-calendar';
import { useState } from 'react';

/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Componente de Home de la Web App
 */
function HomePage() {

    // obtiene usuario del store
    const { user } = useSelector(store => store.authenticate);

    const [dateNow, onChange] = useState(new Date());

    return (
        <div className="common-container dashboard-container">
            <Calendar
                onChange={onChange}
                // value={dateNow}
                // allowPartialRange={true}
            />
            <h1>Bienvenido {user.username}!</h1>
            <p>Haz entrado al consultorio de Laura!!</p>
        </div>
    );
}

export { HomePage };