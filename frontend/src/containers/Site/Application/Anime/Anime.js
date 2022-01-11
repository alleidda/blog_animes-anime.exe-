import React from "react";
import Bouton from "../../../../components/UI/Bouton/Bouton";

const Anime = (props) => (


    <div className="m-4">
        <div className="card mb-3">
            <h3 className="card-header bg-light">{props.nom}</h3>
            <div className="card-body">
                <h5 className="card-title"></h5>
            </div>
            <div className="text-center" style={{ "height": "500px", "width": "100%" }} >
                <img src={props.image} alt={props.nom} className="img-fluid h-100 text-center" />
            </div>
            <div className="card-body">
                <h3>Genre : <Bouton typeBtn="btn-dark" clic={() => props.filtreGenre(props.genre.idGenre, props.genre.genreNom)}>{props.genre.genreNom.toUpperCase()}</Bouton></h3>
            </div>

            <div className="card-body">
                <h3>Studios d'animation : </h3>
                {
                    props.studios.map(studio => {
                        let colorBtn = "";
                        switch (studio.idStudio) {
                            case "1": colorBtn = "btn-primary";
                                break;
                            case "2": colorBtn = "btn-danger";
                                break;
                            case "3": colorBtn = "btn-warning";
                                break;
                            case "4": colorBtn = "btn-success";
                                break;
                            case "5": colorBtn = "btn-info";
                                break;
                            default: colorBtn = "btn-secondary";
                        }
                        return <Bouton typeBtn={colorBtn} css="m-2" key={studio.idStudio}  clic={() => props.filtreStudio(studio.idStudio, studio.studioNom)}>{studio.studioNom}</Bouton>
                    })
                }
            </div>
            <hr />
            <div className="card-body">
                <p className="card-text">{props.description}</p>
            </div>
        </div>
    </div>
);

export default Anime;