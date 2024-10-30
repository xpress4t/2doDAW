const searchInfoButton = document.getElementById("searchInfo")
const searchAllButton = document.getElementById("searchAll")
const searchAllSortedButton = document.getElementById("searchAllSorted")
const miTabla = document.getElementById('table-body');

function showInfo(){
}
searchInfoButton.addEventListener("click",showInfo)


function showAll(){
}
searchAllButton.addEventListener("click",showAll)


function showAllSorted(){
}
searchAllSortedButton.addEventListener("click",showAllSorted)

function obtenerPokemon(){
    fetch("https://pokeapi.co/api/v2/pokemon?limit=100")
    .then(response => response.json())
    .then()
}

function agregarFila() {
    let fila = `
    <tr>
        <td>${nombre}</td>
        <td><img src="${imagen}" alt="${nombre}" width="50" /></td>
        <td>${habilidades}</td>
    </tr>
    `;
    miTabla.innerHTML += fila;
}

obtenerPokemon();