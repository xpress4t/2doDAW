const recetaSelect = document.getElementById("recetaSelect");
const ingredientes = document.getElementById("ingredientes");
const platosConIngrediente = document.getElementById("platosConIngrediente");

const url = "https://www.themealdb.com/api/json/v1/1/";

// ${url}search.php?s=
// ${url}lookup.php?i= (detalles de receta pro id)
// ${url}random.php
// ${url}filter.php?i= (filtrar por ingrediente)

// Cargo las recetas
async function cargarRecetas() {
    const res = await fetch(`${url}search.php?s=`);
    const data = await res.json();
    
    const recetas = data.meals || [];
    recetas.sort((a, b) => a.strMeal.localeCompare(b.strMeal));

    recetas.forEach((receta) => {
        const option = document.createElement("option");
        option.value = receta.idMeal;
        option.textContent = receta.strMeal;
        recetaSelect.appendChild(option);
    });
}

// Mostrar ingredientes de una receta seleccionada
// Debo mostrar hasta 20 ingredientes -> strIngredient1, strIngredient2, ...
async function mostrarIngredientes(idReceta) {
    const res = await fetch(`${url}lookup.php?i=${idReceta}`);
    const data = await res.json();
    const receta = data.meals[0];

    ingredientes.innerHTML = "";
    // https://www.themealdb.com/images/ingredients/lime-small.png
    // ingredients => ${ingrediente}

    for (let i=1;i<=20;i++){
        const ingrediente = receta[`strIngredient${i}`];
        const medida = receta[`strMeasure${i}`];

        if (ingrediente && ingrediente.trim() !== "") {
            const ingredienteDiv = document.createElement("div");
            ingredienteDiv.className = "ingrediente";
            ingredienteDiv.innerHTML = `
                <img src="https://www.themealdb.com/images/ingredients/${ingrediente}-small.png" alt="${ingrediente}">
                <p>${ingrediente} (${medida})</p>
            `;

            ingredienteDiv.addEventListener("click", () => buscarPlatosConIngrediente(ingrediente));
            ingredientes.appendChild(ingredienteDiv);
        }
    }
}

// Buscar platos que contengan un ingrediente específico
async function buscarPlatosConIngrediente(ingrediente) {
    const res = await fetch(`${url}filter.php?i=${ingrediente}`);
    const data = await res.json();
    const platos = data.meals || [];

    platosConIngrediente.innerHTML = "";

    platos.forEach((plato) => {
        const li = document.createElement("li");
        li.textContent = plato.strMeal;
        platosConIngrediente.appendChild(li);
    });
}

recetaSelect.addEventListener("change", (event) => {
    const idReceta = event.target.value;
    if (idReceta) {
        mostrarIngredientes(idReceta);
    }
});

cargarRecetas();