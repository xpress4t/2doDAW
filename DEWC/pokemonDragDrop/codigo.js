/*
Se quiere desarrollar una web con las siguientes funcionalidades:

Listado de Pokémon Arrastrables:
    - Muestra una lista de los 151 Pokémon de la primera generación.
    - Cada Pokémon debe estar representado por su imagen y debe ser posible arrastrarlo.
    - Al pasar el cursor sobre cada imagen de Pokémon, el usuario debe poder seleccionarla y
        arrastrarla a una zona específica de la interfaz llamada "Zona de información".

Zona de Información del Pokémon: 
    - Al arrastrar un Pokémon a la "Zona de información" y soltarlo ahí, la aplicación debe obtener y mostrar datos adicionales del Pokémon seleccionado.
    - La información mostrada debe incluir:
        - Nombre del Pokémon.
        - Imagen ampliada del Pokémon.
        - Lista de Evoluciones (si existen), con una imagen de cada etapa evolutiva.

En caso de que al arrastrar un pokemon a la zona de información ya haya otro pokemon tiene que volver a la posición inicial para poder ver su info más adelante.

*/

var divImg = document.querySelector("#lstImg")
var divPokemonABuscar = document.querySelector("#pokemonABuscar")
var divCaracteristicas = document.querySelector("#caracteristicas")
/*
Recorro los 151 primeros pokemons para ir colocando las imagenes de cada uno de ellos
Como el elemento img no existe desde un principio hay que poner  ondragstart='dragstart(this)' 
dentro de  la misma img.
Además, guardo el dato de la url de la especie, la id y por supuesto el src de la imagen
*/
function cargarImagenes() {
    fetch("https://pokeapi.co/api/v2/pokemon?offset=0&limit=151")
        .then(x => x.json())
        .then(x => {

            for (var pokemon of x.results) {
                fetch("https://pokeapi.co/api/v2/pokemon/" + pokemon.name)
                    .then(y => y.json())
                    .then(pok => {
                        divImg.innerHTML += "<img ondragstart='dragstart(this)' data-ps='" + pok.species.url + "' data-id='" + pok.id + "' draggable=true src='" + pok.sprites.front_default + "'>"
                    })
            }
        })
}

var itemFrom = null
//Guardo la imagen que estoy arrastrando en  una variable
var dragstart = (htmlElement) => {
    itemFrom = htmlElement
}

var dragover = (event) => {
    event.preventDefault()
}

/*
En el div donde se coloca la imagen:
    1º recojo la imagen en caso de que hubiese una y la agrego al listado inicial
    2º coloco la imagen arrastrada en div dónde he soltado la imagen
    3º cargo las evoluciones a través de la url species que había guardado previamente
*/
var drop = (event) => {
    var img = event.target.querySelector("img");
    if (img) {
        lstImg.appendChild(img)
    }
    event.target.appendChild(itemFrom)
    buscarInfoPokemon(itemFrom.getAttribute("data-ps"))
}

var buscarInfoPokemon = (especie) => {
    divCaracteristicas.innerHTML=""
    //busco la especie
    fetch(especie)
        .then(y => y.json())
        .then(pok => {
            //busco la cadena de evolución
            fetch(pok.evolution_chain.url)
                .then(y => y.json())
                .then(pok => {
                    nombreEvolucion = []
                    //obtengo todos los nombres de las evoluciones de ese pokemon
                    obtenerNombresPokemon(pok.chain)
                    for (var item of nombreEvolucion) {
                        //cargo la imagen de las evoluciones
                        fetch("https://pokeapi.co/api/v2/pokemon/" + item)
                        .then(y => y.json())
                        .then(pokemon => {
                            divCaracteristicas.innerHTML += `
                            <div class="divInfo">
                                <p>`+pokemon.name+`</p>
                                <img class='grande' src='` + pokemon.sprites.other.showdown.front_default + `'>
                            </div>`    
                        })
                    }
                })
        })
}

var nombreEvolucion = []
/*
    Función recursiva que va agregando todos los nombres de las evoluciones
    de los pokemon.
    Como es un array se tiene que recorrer siempre.
*/
function obtenerNombresPokemon(chain) {
    nombreEvolucion.push(chain.species.name)
    for (var evolucion of chain.evolves_to) {
        obtenerNombresPokemon(evolucion)
    }
}



cargarImagenes()
divPokemonABuscar.addEventListener("dragover", dragover)
divPokemonABuscar.addEventListener("drop", drop)