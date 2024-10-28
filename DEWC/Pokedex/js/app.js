var div = document.querySelector('.pokemon-image')
imagenPokemon()
var lista = document.querySelector('#lista-pokemones')


var sound = new Audio()
sound.src = "./media/audio/Opening Pokémon.m4a"
sound.loop = true
sound.autoplay = true


function imagenPokemon(){
    fetch("https://pokeapi.co/api/v2/pokemon/totodile")
    .then(resultado => resultado.json())
    .then(resultado => {
        // Esto es para mostrar la imagen estática del pokemon
        //div.innerHTML = "<img src="+resultado.sprites.front_default+">"
        div.innerHTML = "<img src="+resultado.sprites.other.showdown.front_default+">"
    })
    .catch(error => {
            console.log("Error al obtener imagen del Pokémon"+error)
    })
}
// Muestra en pantalla la imagen del pokemon

// Al hacer click que me aparezca la animación del pokémon
div.addEventListener("click",event =>{
    event.target.style.backgroundColor = "red"
})

function maousePorEncima(){
    fetch()
    .then(resultado => resultado.json())
    .then(resultado => {
        clase.innerHTML = ""
    })
}

var myButton = document.querySelector('.button__play')

myButton.addEventListener("click",event => {
    
})