import React from "react";
import {Producto} from './Producto';

export const TiendaOnline = (({productos}) => {
    return <div className="row">
        {productos && productos.map((x,i)=>(
            <div key={i} className="col-md-3 col-sm-6">
                <Producto id={x.id}/>
            </div>
        ))}
        </div>
})