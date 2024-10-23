//objeto promesa
function ejemplo1(){
    //tenemos que pasarle una funcion
    //resolve lo que va a resolver para devolver
    //reject cualquier tipo de error
    //las promesas solo pueden tener un estado o resuelto o rechazado y se queda con el primer estado que ejecuta
    let promesa = new Promise((resolve,reject)=>{
        resolve(132)
        reject("Ha habido un error")
    })
}
 
function ejemplo2(){
    let promesa = new Promise((resolve,reject)=>{
        var num = 456
        resolve({error:false, resultado:num})
        reject({error:false, resultado:num})
    })
 
    promesa.then((valor)=>{
        console.log("Promesa cumplida correctamente")
        console.log("El valor devuelto es: "+valor.resultado)
    }).catch((error)=>{
        console.log("Promesa cumplida de forma de error")
        console.log("El valor devuelto es: "+error.error)
    })
   
}
 
function ejemplo3(){
    //para que devuelva los resultados de las promesas
    //Promise.all espero a que todas las promesas se resuelvan si falla uno va al catch
    //Promise.allSettled te devuelven las dos el then y en catch
    Promise.all([ejemplo1(),ejemplo1()]).then((resultados)=>{
        console.log("Todas las promeasa se han resulto correctamente")
        console.log("Los valores son: "+resultados)
    }).catch((errores)=>{
 
    })
}
 
var div = document.querySelector("#contenedor")
 
function ejemplo4(){
    //la funcion fetch hace peticiones a servidores externos y nos devuelve una promesa
    //cada servidor devuelve la informacion en una estructura diferente
    fetch("https://pokeapi.co/api/v2/pokemon/mewtwo")
    .then(resultado=>{
        console.log("Todo OK")
        console.log(resultado)
        return resultado.json() //para pasar la estructura a json
    }).then(resultado=>{
        console.log(resultado)
        div.innerHTML = "<img src="+resultado.sprites.other.showdown.front_default+">"
        
    })
    .catch(error=>{
        console.log("Ha habido un error: "+error)
    })
}
//////////////////////////////////////////////////////////////////////////////////////////////

var lista = document.querySelector('#lista')

function mostrarLista(){
    fetch("https://pokeapi.co/api/v2/pokemon?limit=500")
    .then(resultado =>{
        return resultado.json()
    })
    .then(data => {
        let opciones = '';
        data.results.forEach(pokemon => {
            opciones += `<option value="${pokemon.name}">${pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1)}</option>`;
        });
        lista.innerHTML = opciones;
    })

}

// mostrarLista();

// Función para mostrar pokemones con movimiento
function obtenerPokemones() {
    fetch("https://pokeapi.co/api/v2/pokemon?limit=200")
    .then(response => response.json())
    .then(data => {
        let promesas = []
        data.results.forEach(pokemon => {
            let promesa = fetch(pokemon.url)
                .then(response => response.json())
            promesas.push(promesa)
        })
        return Promise.all(promesas)
    })
    .then(pokemones => {
        let html = ""
        pokemones.forEach(pokemon => {
            let abilities = pokemon.abilities.map(ability => ability.ability.name).join(', ')
            html += `<div>
                        <h2 style = "color:red;">${pokemon.name}</h2>
                        <img src="${pokemon.sprites.other.showdown.front_default}" alt="${pokemon.name}">
                        <p>${abilities}</p>
                     </div>`
        })

        div.innerHTML = html
    })
    .catch(error => {
        console.log("Error al obtener los pokemones: " + error)
    })
}

// obtenerPokemones();

