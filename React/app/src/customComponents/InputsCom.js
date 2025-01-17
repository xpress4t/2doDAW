import React from "react";
export const InputsCom = (props) =>{
    return <>
    <label htmlFor={props.label}>{props.label}:</label>
    <input id={props.label} type={props.type} required={props.required}></input>
    </>
}