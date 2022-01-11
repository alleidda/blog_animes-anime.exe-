import React from "react";
import {withFormik} from "formik";
import * as Yup from "yup";

const Formulaire = (props) => {
    return (
        <div>
            <form>
                <div className="mb-3">
                <div>
                    <label htmlFor="nom" className="form-label">Nom :</label>
                    <input type="text" className="form-control" id="nom" aria-describedby="nomHelp" 
                        name="nom"
                        onChange={props.handleChange}
                        value={props.values.nom}
                        onBlur={props.handleBlur}
                    />
                    {
                       props.touched.nom && props.errors.nom && <span style={{color:"red"}}>{props.errors.nom}</span>
                    }
                    </div>
                    <div>
                    <label htmlFor="exampleInputEmail1" className="form-label">Email :</label>
                    <input type="email" className="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                        name="email"
                        onChange={props.handleChange}
                        value={props.values.email}
                        onBlur={props.handleBlur}

                    />
                     {
                       props.touched.email && props.errors.nom && <span style={{color:"red"}}>{props.errors.email}</span>
                    }
                    </div>
                    <div>
                    <label htmlFor="message">Message :</label>
                    <div className="form-floating">
                        <textarea className="form-control" placeholder="Leave a comment here" id="message"
                        name="message"
                        onChange={props.handleChange}
                        value={props.values.message}
                        onBlur={props.handleBlur}

                        ></textarea>
                         {
                       props.touched.message && props.errors.nom && <span style={{color:"red"}}>{props.errors.message}</span>
                    }
                    </div>
                    </div>
                </div>
                <button type="submit" className="btn btn-primary" onClick={props.handleSubmit}>Envoyer</button>
            </form>
        </div>
    );
}

export default withFormik({
    mapPropsToValues : () => ({
        nom:"",
        email:"",
        message:""
}),
validationSchema : Yup.object().shape({
    nom: Yup.string()
        .min(5, "Le nom doit avoir plus de 3 caractères")
        .required("Le nom est obligatoire !"),
    email: Yup.string()
        .email("L'email n'a pas le bon format")
        .required("L'email est obligatoire"),
    message: Yup.string()
        .min(50,"Le message doit contenir plus de 50 caractères")
        .max(200, "Le message doit faire moins de 200 charactères")
}),
handleSubmit: (values) => {
    alert("Message Envoyé");
}
})(Formulaire);
