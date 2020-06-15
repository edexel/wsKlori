import React from 'react';
import { Link } from 'react-router-dom';
import { useSelector, useDispatch } from 'react-redux';
// import { Calendar } from 'react-widgets'
import { DatePicker, RangePicker, theme } from 'react-trip-date';
import { ThemeProvider } from 'styled-components';

const handleResponsive = setNumberOfMonth => {

    setNumberOfMonth(1);
};

const Day = ({ day }) => {
    return (
        <>
            <p className="date">{day.format('DD')}</p>
        </>
    );
};

/**
 * Created by Joel Valdivia
 * Date 05 Jun 2020
 * Description: Componente de Home de la Web App
 */
function HomePage() {

    // obtiene usuario del store
    const { user } = useSelector(store => store.authenticate);

    const onChange = date => console.log(date)

    const Title = ({ source }) => {
        console.log(source)
        let titleDay = ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']
        return (
            <div className='title-weeks'>
                {
                    titleDay.map(item => (<p key={Math.random()}>{item}</p>))
                }
            </div>)
    }
    return (
        <div className="common-container dashboard-container">
            <ThemeProvider theme={theme}>
                <DatePicker
                    handleChange={onChange}
                    selectedDays={['2020-06-15']} //initial selected days
                    jalali={false}
                    // numberOfMonths={3}
                    // numberOfSelectableDays={3} // number of days you need 
                    // disabledDays={['2019-12-02']} //disabeld days
                    // responsive={handleResponsive} // custom responsive, when using it, `numberOfMonths` props not working
                    disabledBeforToday={true}
                    disabled={false} // disable calendar 
                // dayComponent={Day} //custom day component 
                titleComponent={Title} // custom title of days
                />
            </ThemeProvider>
            <h1>Bienvenido {user.username}!</h1>
            <p>Haz entrado al consultorio de Laura!!</p>
        </div>
    );
}

export { HomePage };