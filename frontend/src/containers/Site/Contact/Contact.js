import React , {useEffect} from 'react';
import TitreH1 from '../../../components/UI/Titres/TitreH1';
import Formulaire from './Formulaire/Formulaire';

const Contact = () => {
    useEffect(() => {
        document.title = 'Page de contact';
      },[]);

    return (
        <div>
        <TitreH1 bgColor="bg-success">Contactez nous!</TitreH1>
        <div className='container'>
            <h2>Adresse :</h2>
            <p>contactanimeexe@gmail.com</p>
            <h2>Téléphone</h2>
            <p>06 12 34 56 78</p>
            <h2>Vous préfèrez nous écrire ?</h2>
            <Formulaire />
        </div>
        </div>
    );
}

export default Contact;