var pokemonImage = document.querySelector('.pokemon-image')
imagenPokemon()

var pokemonAbility = document.querySelector(".pokemon_inf--ability")
tablaHabilidades()

var lista = document.querySelector('#lista-pokemones')

function imagenPokemon(){
    fetch("https://pokeapi.co/api/v2/pokemon/totodile")
    .then(resultado => resultado.json())
    .then(resultado => {
        pokemonImage.innerHTML = "<img src="+resultado.sprites.front_default+">"
    })
}

function tablaHabilidades(){
    fetch("https://pokeapi.co/api/v2/pokemon/totodile")
    .then(resultado => resultado.json())
    .then(resultado => {
        pokemonAbility.innerHTML = "<ul>"+
        resultado.abilities.map(ability => "<li>"+ability.ability.name+"</li>").join('')+"</ul>"
    })
}