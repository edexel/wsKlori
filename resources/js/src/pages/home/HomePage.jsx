import React from 'react';
import { Link } from 'react-router-dom';

/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Componente de Home de la Web App
 */
function HomePage() {

    return (
        <div className="col-lg-8 offset-lg-2">
            <h1>Hi !</h1>
            <p>You're logged in with React Hooks!!</p>
            <h3>All registered users:</h3>

            <p>
                <Link to="/login">Logout</Link>
            </p>
        </div>
    );
}

export { HomePage };