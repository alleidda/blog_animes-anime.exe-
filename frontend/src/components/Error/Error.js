import React from "react";
import TitreH1 from "../UI/Titres/TitreH1";

const error = (props) => (
    <div>
    <TitreH1 bgColor="bg-danger">Erreur {props.type}</TitreH1>
    <div>
        {props.children}
    </div>
    </div>
    
);

export default error;