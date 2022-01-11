import React, {useEffect} from 'react';
import TitreH1 from "../../../components/UI/Titres/TitreH1";
import banderole from "../../../assets/images/ban1.jpg";
import logo from "../../../assets/images/logo1.png"

const Accueil = () => {
    useEffect(() => {
        document.title = 'Animes.exe';
      },[]);

        return (
            <div>
            <img src={banderole} alt="banderole" className="img-fluid"/>
            <TitreH1 bgColor="bg-success">Bienvenu sur mon site dédié aux animes</TitreH1>
            <div className="container">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur doloribus reiciendis itaque autem numquam odit recusandae maxime ea et, hic eaque molestiae vero aut eos esse est iure ullam exercitationem?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur doloribus reiciendis itaque autem numquam odit recusandae maxime ea et, hic eaque molestiae vero aut eos esse est iure ullam exercitationem?
                </p>
                <div className="row no-gutters align-items-center">
                    <div className="col-12 col-md-6">
                        <img src={logo} alt="logo anime blog" className="image-fluide"/>
                    </div>
                    <div className="col-12 col-md-6">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa libero quod modi maiores magnam? Voluptatum veniam totam ipsam officiis. Laboriosam dicta quas quibusdam sapiente corrupti necessitatibus magnam nulla fugiat consequatur.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure quo quisquam fugiat ad tempore incidunt sed eos itaque corporis. Dolorum ab officia dolore amet iusto maiores excepturi cupiditate ipsa aperiam?
                        </div>
                        <div className="col-12 col-md-6">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa libero quod modi maiores magnam? Voluptatum veniam totam ipsam officiis. Laboriosam dicta quas quibusdam sapiente corrupti necessitatibus magnam nulla fugiat consequatur.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure quo quisquam fugiat ad tempore incidunt sed eos itaque corporis. Dolorum ab officia dolore amet iusto maiores excepturi cupiditate ipsa aperiam?
                        </div>
                        <div className="col-12 col-md-6">
                        <img src={logo} alt="logo anime blog" className="image-fluide"/>
                    </div>
                </div>
            </div>
            </div>
        );
    }

export default Accueil;