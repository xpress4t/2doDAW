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
¿Cómo sacar las evoluciones de cualquier pokemon?
    cualquier pokemon -> species -> evolution_chain -> Todas las evoluciones de ese pokemon, desde la 1º a la última.
Por si os sirve -> usar función recursiva sencilla para recuperar todas las evoluciones
*/
const detalles = document.getElementById("pokemon-details");
const zonaInformacion = document.getElementById("info-zone");
cargarListaPokemon();

function cargarListaPokemon() {
    fetch("https://pokeapi.co/api/v2/pokemon?limit=20&offset=0")
    .then(response => response.json())
    .then(data => {
        data.results.forEach(pokemon => {
            fetch(pokemon.url)
            .then(response => response.json())
            .then(pokeInfo => {
                agregarPokemon(pokeInfo);
            });
        });
    });
}

function agregarPokemon(pokemon) {
    const imagen = document.createElement("img");
    imagen.src = pokemon.sprites.front_default;
    imagen.draggable = true;
    imagen.id = pokemon.name;
    imagen.addEventListener("dragstart",drag);
    document.getElementById("pokemon-list").appendChild(imagen);
}


function mostrarInfoPokemon(pokemon) {
    detalles.innerHTML = `
        <p>${pokemon.name}</p>
        <img src="${pokemon.sprites.front_default}">
    `;

    fetch(pokemon.species.url)
    .then(response => response.json())
    .then(speciesData => fetch(speciesData.evolution_chain.url))
    .then(response => response.json())
    .then(evolutionData => {
        let evols = [];
        let tiposEvol = evolutionData.chain;
        
        while (tiposEvol) {
            evols.push(tiposEvol.species.name);
            tiposEvol = tiposEvol.evolves_to[0];
        }
        evols.forEach(name => {
            fetch(`https://pokeapi.co/api/v2/pokemon/${name}`)
            .then(response => response.json())
            .then(pokeEvol => {
                const evolucion = document.createElement("img");
                evolucion.src = pokeEvol.sprites.other.showdown.front_default;
                detalles.appendChild(evolucion);
            });
        });
    });
}

function allowDrop(e) {
    e.preventDefault();
}
zonaInformacion.addEventListener("dragover",allowDrop);

function drag(e) {
    e.dataTransfer.setData("text",e.target.id);
}

function drop(e) {
    e.preventDefault();
    const nombrePokemon = e.dataTransfer.getData("text");
    fetch(`https://pokeapi.co/api/v2/pokemon/${nombrePokemon}`)
    .then(response => response.json())
    .then(pokemon => {
        mostrarInfoPokemon(pokemon);
    });
}
zonaInformacion.addEventListener("drop",drop);