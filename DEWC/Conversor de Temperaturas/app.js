// Celsius a Fahrenheit	T(°F) = [(9/5)T(°C)]+32 ‍
    // Farenheit a Celsius	T(°C) = (5/9)[T(°F)−32] ‍
    // Celsius a Kelvin	T(K) = T(°C)+273
    // Kelvin a Celsius	T(°C) = T(K)-273
    // Fahrenheit a Kelvin	T(K) = [(5/9)(T(°F)-32)]+273
    // Kelvin a Fahrenheit	T(°F) = [(9/5)(T(K)-273)+32]

const temperatura1 = document.getElementById('temperaturaDeEntrada')
const temperatura2 = document.getElementById('temperaturaDeSalida')
const mostrarOperacion = document.querySelector('.operation')
const operacionSeleccionada = document.querySelector()

let operacion = ""

function operaciones() {
    const tempValor = parseFloat(temperatura1)
    switch (operacion) {
        case "Celsius a Fahrenheit":
            resultado = (9 / 5) * tempValor + 32
            break
        case "Fahrenheit a Celsius":
            resultado = (5 / 9) * (tempValor - 32)
            break
        case "Celsius a Kelvin":
            resultado = tempValor + 273
            break
        case "Kelvin a Celsius":
            resultado = tempValor - 273
            break
        case "Fahrenheit a Kelvin":
            resultado = (5 / 9) * (tempValor - 32) + 273
            break
        case "Kelvin a Fahrenheit":
            resultado = (9 / 5) * (tempValor - 273) + 32
            break
    }

}

function mostrarOp() {
    mostrarOperacion.innerHTML = `<p>${temperatura1} + ${temperatura2}</p>`
}

mostrarOp()