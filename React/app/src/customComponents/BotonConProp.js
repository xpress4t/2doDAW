import React from "react";
export const BotonConProp = ({text,text1,fnClic}) =>{
    if(!text1){
        text1 = "este dato no ha sido rellenado" //por si no ingresan el txt1 te da un valor pred
    }
    return <button onClick={fnClic}>{text} {text1}</button>

}