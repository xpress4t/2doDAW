import React from "react";

export const Producto = (({props}) => {
    function onHover(e){
        if(props.producto.inStock){
            e.target.classList.remove("hacerPequeño");
            e.target.classList.add("hacerGrande");
        }else{
            e.target.classList.remove("hacerGrande");
            e.target.classList.add("hacerPequeño");
        }
    }   
    function fnSalir(e){
        e.target.classList.add("hacerPequeño");
        
    }
    return <div>
        <h2>{props.producto.name}</h2>
        <img onHover={onHover} src={props.producto.img}></img>
        <div>
            <p>
                Precio: {props.producto.price}
            </p>
            <p>
                <input type="checkbox" checked = {(props.producto.inStock?"checked":"")}></input>
            </p>
            <p>
                Categoría: {props.producto.category}
            </p>
            <p>
                Calificación: {props.producto.rating}
            </p>
        </div>
    </div>
})