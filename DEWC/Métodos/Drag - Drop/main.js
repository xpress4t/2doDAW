var imagen = null

var divPosibleContenedor = null

var dragstart = (event) => {
    imagen = event.target
}

var dragover = (event) => {
    event.preventDefault()
}

var drop = (event) => {
    if(event.target.tagName =="IMG"){
        event.target.closest("div").appendChild(imagen)
    }else{
        event.target.appendChild(imagen)
    }
    //
}

var dragenter = (event) =>{
    event.preventDefault()
    divPosibleContenedor = event.target.closest("div")
    imagen.classList.add("posibleimagen")
    event.target.appendChild(imagen)
}

var dragleave = (event) =>{
}

Array.from(contenedoresImagenes).forEach(function(item,pos){
    item.addEventListener("dragenter",dragenter)
    item.addEventListener("dragleave",dragleave)
    item.addEventListener("dragover",dragover)
    item.addEventListener("drop",drop)
})

Array.from(contenedoresInicialImagenes).forEach(function(item,pos){
    item.addEventListener("dragenter",dragenter)
    item.addEventListener("dragleave",dragleave)
    item.addEventListener("dragover",dragover)
    item.addEventListener("drop",drop)
})

Array.from(imgs).forEach(function(item,pos){
    item.addEventListener("dragstart",dragstart)
})