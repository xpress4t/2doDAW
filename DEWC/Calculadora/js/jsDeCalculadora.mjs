var botones = document.querySelectorAll("button")
var inp = document.querySelector("#resultado")

// input --> tienen value --> value para todo lo que no sea texto
// textos --> innerText --> para todo lo que no sea input

let operacionActual = "";
let operador = "";

function agregarTextoInput(e){
    let valorBoton = e.target.innerText;

    if (e.target.classList.contains("numeros")) {
        operacionActual += valorBoton;
        inp.value = operacionActual;
    }

    if (e.target.classList.contains("operación")) {
        if (operacionActual === "") return;
            operador = valorBoton;
            operacionActual += " " + valorBoton + " ";
            inp.value = operacionActual;
    }

    if (e.target.classList.contains("igual")) {
        let resultado = eval(operacionActual.replace("x", "*").replace("%", "/100"));
        inp.value = resultado;
        operacionActual = resultado.toString();  
    }

    if (e.target.classList.contains("ponerEnCero")) {
        operacionActual = "";
        inp.value = "";
    }
}

for(var i=0;i<botones.length;i++){
    botones[i].addEventListener("click",agregarTextoInput)
}


// Hacer un rompecabezas con uan imagen grande de los simpsons utilizando drop and drag
