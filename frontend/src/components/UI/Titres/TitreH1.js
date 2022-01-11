import React from "react";

const TitreH1 = (props) => {
    let backgroundColor = props.bgColor ? props.bgColor: "bg-secondary";
    let monCss = `border border-dark  p-2 text-white text-center ${backgroundColor}`;
    return <h1 className={monCss}>{props.children}</h1>
};

export default TitreH1;