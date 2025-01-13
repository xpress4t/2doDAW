import React from "react";
import { Boton } from "./Boton";
import { Input } from "./Input";
import "../customCSS/Formulario.css";
export const Formulario = () => {
    const evento = (e)=>{
        e.preventDefault()
        Array.from(e.target.parentElement).forEach((x)=>{
            if(x.type=="text"){
                console.log(x.value)
            }
        })
    }
    return <form>
        <Input></Input>
        <Input></Input>
        <Input></Input>
        <Input></Input>
        <button type="submit" onClick={evento}>Enviar</button>
    </form>
} 