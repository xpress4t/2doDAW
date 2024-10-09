const myBox = document.getElementById("myBox");
const myButton = document.getElementById("myButton");

// Es lo mismo function(event) {
//             }

// que         event => {
//             }


myBox.addEventListener("click",event =>{
    event.target.style.color = "white";
    event.target.style.backgroundColor = "green";
    event.target.textContent = " hiciste click";
});

myBox.addEventListener("mouseover",event=>{
    event.target.style.color = "black";
    event.target.style.backgroundColor = "red"
    event.target.textContent = "Estás poniendo el ratón sobre el cuadro"
});

myBox.addEventListener("mouseout",event => {
    event.target.style.color = "yellow";
    event.target.style.backgroundColor = "black";
    event.target.textContent = "El ratón está fuera del cuadro";
});