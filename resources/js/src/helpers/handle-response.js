/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Descripcion Manejador de respuestas de peticiones HTTP
 * @param {Object} response variable con la respuesta de una peticion HTTP
 */
export const handleResponse = function(response) {
    return response.text().then(text => {
        const data = text && JSON.parse(text);
        if (!response.ok) {
            if (response.status === 401) {
                // auto logout if 401 response returned from api
                logout();
                location.reload(true);
            }

            const error = (data && data.message) || response.statusText;
            return Promise.reject(error);
        }

        return data;
    });
}