var contenedoresImagenes = document.querySelectorAll(".contenedortierlist")
var contenedoresInicialImagenes = document.querySelectorAll(".div-img-inicial")

var imgs = document.querySelectorAll("img")


var imagen = null
var divPosibleContenedor = null

var dragstart = (event) => {
    imagen = event.target
}
var dragover = (event) => {
    /*
    El evento dragover es esencial para permitir que el elemento sobre el 
    cual estás arrastrando pueda recibir el evento drop. 
    Si no se llama a event.preventDefault() en el evento dragover, 
    el navegador no permitirá que se dispare el evento drop en ese elemento.
    
    En otras palabras, sin event.preventDefault() en dragover, el navegador asume
    que el elemento no puede ser un destino válido de "drop" y, por lo tanto, 
    no ejecutará el evento drop. 
    */
    event.preventDefault()
}

var drop = (event) => {
    if (event.target.tagName == "IMG") {
        divPosibleContenedor.appendChild(imagen).classList.remove("posibleimagen")
    } else{
        event.target.appendChild(imagen).classList.remove("posibleimagen")
    }

}
var dragenter = (event) => {
    event.preventDefault()
    divPosibleContenedor = event.target.closest("div")

    divPosibleContenedor.appendChild(imagen)
    divPosibleContenedor.lastElementChild.classList.add("posibleimagen")
}
var dragleave = (event) => {
    event.preventDefault()

}
Array.from(contenedoresImagenes).forEach(function (item, pos) {
    item.addEventListener("dragenter", dragenter)
    item.addEventListener("dragleave", dragleave)
    item.addEventListener("dragover", dragover)
    item.addEventListener("drop", drop)
})
Array.from(contenedoresInicialImagenes).forEach(function (item, pos) {
    item.addEventListener("dragenter", dragenter)
    item.addEventListener("dragleave", dragleave)
    item.addEventListener("dragover", dragover)
    item.addEventListener("drop", drop)
})
Array.from(imgs).forEach(function (item, pos) {
    item.addEventListener("dragstart", dragstart)
})
