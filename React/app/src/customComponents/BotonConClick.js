import React, {use,useState} from 'react';
// si modificamos ese estado, se considerará ese cambio entonces se renderiza (mostrar por pantalla)
// Nos va a generar un estado asociado a ese componente
// los useState jamás pueden estar dentro de una función ni dentro de un if, while, for o bucles; 
// siempre se declaran fuera de funciones, fuera de estructuras de control
var src1 = "https://i.pinimg.com/236x/05/49/86/05498664d54894f92c6523c50c1eb9e6.jpg";
var src2 = "https://www.patasencasa.com/sites/default/files/2024-07/meme-del-gato-riendo_0.jpg";
var src3 = "https://i.pinimg.com/236x/37/ab/7a/37ab7a8e579e5c307092cda929f036a2.jpg";

export const BotonConClick = () => {
    // creamos un array con 2 elementos
    // Siempre es un valor inicial que va a tomar mi estado 
    var [numClick,setNumClick] = useState(0)
    var [numClickStr,setNumClickStr] = useState("hola")
    var [arrayState,setArrayState] = useState([])

    const [imageState, setImageState] = useState(src1);
    function fnOnClick(){
        // numClick=1
        setNumClick(numClick+1)
    }
    function fnOnChange(e){
        setNumClickStr(e.target.value)
        // ...-> sacar uno por uno los elementos de un arraypara generar un nuevo array
        // setArrayState([...arrayState,e.target.value]) -> solo se puede modificar el estado a partir de un set
        setArrayState([...arrayState,e.target.value])
        setArrayState(arrayState)
        console.log(arrayState)
    }

    setInterval(()=>{
        if(imageState===src1){
            setImageState(src2)
        }else if(imageState===src2){
            setImageState(src3)
        }else{
            setImageState(src1)
        }
    },100);
    return <>
        <p>Veces pulsado:{numClick}</p>
        <button onClick={fnOnClick}>{numClickStr}</button>
        <input onChange={fnOnChange}></input>
        <img src={imageState}></img>
    </>
}