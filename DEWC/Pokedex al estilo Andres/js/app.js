var miTabla = document.getElementById('table-body');

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