import React from 'react';
import { Link } from 'react-router-dom';
import { useSelector, useDispatch } from 'react-redux';

import { Calendar } from '../../components/Calendar';



/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Componente de Home de la Web App
 */
function HomePage() {

    // obtiene usuario del store
    const { user } = useSelector(store => store.authenticate);

    const onChange = (startDate, endDate) => {
        console.log(startDate, endDate)
    }

    return (
        <div className="common-container dashboard-container">
            <Calendar onChange={onChange}/>
           
            {/* <Calendar
                onChange={onChange}
                // value={dateNow}
                // allowPartialRange={true}
            /> */}
            <h1>Bienvenido {user.username}!</h1>
            <p>Haz entrado al consultorio de Laura!!</p>
        </div>
    );
}

export { HomePage };