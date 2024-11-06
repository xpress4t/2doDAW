const myBox = document.getElementById("myBox");
const myButton = document.getElementById("myButton");

function haciendoClick(event){
    event.target.style.color="white";
    event.target.style.backgroundColor="green";
    event.target.textContent="clickaste bro";
    event.target.style.backgroundImage="url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi_9zuYeWr725QU6qOESAMZ0P8UNqwkppMSg&s')";
}

function pasandoRaton(event){
    event.target.style.color="black";
    event.target.style.backgroundColor="red";
    event.target.textContent="El cursor está dentro del cuadro";

}

function sacandoRaton(event){
    event.target.style.color="orange";
    event.target.style.backgroundColor="yellow";
    event.target.textContent="El cursor está fuera del cuadro";
}

myBox.addEventListener("click",haciendoClick);
myBox.addEventListener("mouseover",pasandoRaton);
myBox.addEventListener("mouseout",sacandoRaton);