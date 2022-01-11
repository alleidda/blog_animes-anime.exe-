import React from 'react';
import NavBar from '../../components/UI/NavBar/NavBar';
import {Switch, Route} from "react-router-dom";
import Application from './Application/Application';
import Accueil from './Accueil/Accueil';
import Error from '../../components/Error/Error';
import Footer from "../../components/Footer/Footer"
import Contact from './Contact/Contact';

const Site = () => {
    return (
        <div>
        <div className='site'>
        <NavBar/>
        <Switch>
        <Route path="/animes"  exact render={() =><Application/> } />
        <Route path="/contact"  exact render={() =><Contact/> } />
        <Route path="/" exact render={() => <Accueil/>} />
        <Route render={() => <Error type="404">La page n'existe pas</Error>} />
        </Switch>
        <div className='minSite'></div>
        </div>
        <Footer/>
        </div>
    );
}



export default Site;