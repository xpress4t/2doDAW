import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';   // This is the css file that is used in the project

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