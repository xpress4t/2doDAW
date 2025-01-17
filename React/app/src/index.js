import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import { FormCom } from './customComponents/FormCom';
import {Boton} from './customComponents/Boton';
import { Formulario } from './customComponents/Formulario';
import { BotonConProp } from './customComponents/BotonConProp';
import { BotonConProp2 } from './customComponents/BotonConProp2';
import {Producto} from './Tienda/Producto';
import {TiendaOnline} from './Tienda/TiendaOnline';

const root = ReactDOM.createRoot(document.getElementById('root'));

var click1 = () => {
  console.log("wa1")
}

var click2 = () => {
  console.log("wa2")
}

var inputs = [];
inputs.push(
  { required: true, type: 'text', label: "Nombre" },
  { required: true, type: 'text', label: "Apellido1" },
  { required: true, type: 'text', label: "Apellido2" },
  { required: true, type: 'number', label: "Edad" },
  { required: false, type: 'number', label: "Teléfono" },
  { required: false, type: 'text', label: "Dirección" },
  { required: false, type: 'date', label: "fecha" },
)

var products = []; 
products.push({ id: 1, name: 'Laptop', price: 999.99, inStock: true, category: 'Electronics', rating: 4.5 },   
  { id: 2, name: 'Smartphone', price: 699.99, inStock: false, category: 'Electronics', rating: 4.8 },   
  { id: 3, name: 'Chair', price: 49.99, inStock: true, category: 'Furniture', rating: 4.2 },   
  { id: 4, name: 'Desk Lamp', price: 19.99, inStock: true, category: 'Home Decor', rating: 4.0 },   
  { id: 5, name: 'Headphones', price: 199.99, inStock: true, category: 'Electronics', rating: 4.7 },   
  { id: 6, name: 'Backpack', price: 39.99, inStock: false, category: 'Accessories', rating: 4.1 },   
  { id: 7, name: 'Coffee Maker', price: 89.99, inStock: true, category: 'Appliances', rating: 4.6 });


root.render(
  <React.StrictMode>
    <Boton></Boton>
    <Boton></Boton>
    <Formulario></Formulario>
    <BotonConProp fnClic={click1} text={"PULSAME CAUSA"}></BotonConProp>
    <BotonConProp fnClic={click2} text={"NO ME PULSES CAUSA"} text1={"GAAAAA"}></BotonConProp>
    <BotonConProp2 text={"SOY UN BOTON"}></BotonConProp2>
    <FormCom inputs={inputs}></FormCom>
    <TiendaOnline productos={products}></TiendaOnline>
  </React.StrictMode>
);


