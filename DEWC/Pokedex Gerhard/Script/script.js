var div = document.querySelector("#grid__box")
var selector = document.querySelector("select")
agregarNombres()
var boton__info = document.querySelector("#buscar__info")
boton__info.addEventListener("click",buscarInfo)
const plantilla__pokemon = document.querySelector("#poke__template")
generarPokemons()
 
function agregarNombres(){
    fetch("https://pokeapi.co/api/v2/pokemon/?offset=0&limit=200")
    .then(resultado=>{
        return resultado.json()
    }).then(resultado=>{
        resultado.results.forEach(x=>{
            selector.innerHTML += "<option>"+x.name+"</option>"
        })
       
    })
    .catch()
}
 
function generarPokemons(){
    fetch("https://pokeapi.co/api/v2/pokemon/?offset=0&limit=200").then(resultado=>{
        return resultado.json()
    })
    .then(resultado=>{
        const promesas = resultado.results.map(obj => {
            const copia = document.importNode(plantilla__pokemon.content, true)
            return fetch(obj.url)
            .then(resultado=>{
                return resultado.json()
            })
            .then(resultado=>{
                copia.querySelector(".poke__nombre h1").innerText = resultado.name[0].toUpperCase()+resultado.name.slice(1)
                copia.querySelector(".poke__img img").src = resultado.sprites.front_default
                copia.querySelector(".iv__hp").innerText = resultado.stats[0].base_stat
                copia.querySelector(".iv__atc").innerText = resultado.stats[1].base_stat
                copia.querySelector(".iv__def").innerText = resultado.stats[2].base_stat
                copia.querySelector(".iv__spatc").innerText = resultado.stats[3].base_stat
                copia.querySelector(".iv__spdef").innerText = resultado.stats[4].base_stat
                copia.querySelector(".iv__spd").innerText = resultado.stats[0].base_stat
                return copia
            })
        })
        Promise.all(promesas)
        .then(copias => {
            console.log(promesas)
            copias.forEach(copia => div.appendChild(copia));
        })
    })
   
}
 
function buscarInfo(){  
    let pokemon__seleccionado = selector.options[selector.selectedIndex].text
    fetch("https://pokeapi.co/api/v2/pokemon/"+pokemon__seleccionado).then(resultado=>{
        return resultado.json()
    }).then(resultado=>{
        div.innerHTML = "<img src="+resultado.sprites.other.showdown.front_default+">"
    })
   
}