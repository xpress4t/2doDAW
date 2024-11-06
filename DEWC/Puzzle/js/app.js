const imagenes = [
    'fila-1-columna-1', 'fila-1-columna-2', 'fila-1-columna-3', 'fila-1-columna-4',
    'fila-2-columna-1', 'fila-2-columna-2', 'fila-2-columna-3', 'fila-2-columna-4',
    'fila-3-columna-1', 'fila-3-columna-2', 'fila-3-columna-3', 'fila-3-columna-4',
    'fila-4-columna-1', 'fila-4-columna-2', 'fila-4-columna-3', 'fila-4-columna-4'
];

const puzzle = document.getElementById('puzzle');
const piezas = document.getElementById('piezas');
const mensaje = document.getElementById('mensaje');

let terminado = imagenes.length;

while (imagenes.length) {
    const index = Math.floor(Math.random() * imagenes.length);
    const div = document.createElement('div');
    div.className = 'pieza';
    div.id = imagenes[index];
    div.draggable = true;
    div.style.backgroundImage = `url("images/${imagenes[index]}.jpg")`;
    piezas.appendChild(div);
    imagenes.splice(index, 1);
}

for (let i = 0; i < terminado; i++) {
    const div = document.createElement('div');
    div.className = 'placeholder';
    div.dataset.id = i;
    puzzle.appendChild(div);
}


piezas.addEventListener('dragstart', e => {
    e.dataTransfer.setData('id', e.target.id);
});

puzzle.addEventListener('dragover', e => {
    e.preventDefault();
    e.target.classList.add('hover');
});

puzzle.addEventListener('dragleave', e => {
    e.target.classList.remove('hover');
});

puzzle.addEventListener('drop', e => {
    e.target.classList.remove('hover');

    const id = e.dataTransfer.getData('id');
    const numero = id.split('-')[1];

    if (e.target.dataset.id === numero) {
        e.target.appendChild(document.getElementById(id));

        terminado--;

        if (terminado === 0) {
            document.body.classList.add('ganaste');
        }
    }
});

/*
const piezas = [
    fila-1-columna-1,
]


piezas.innerHTML = aux;

var imagenEnMovimiento;

piezas.addEventListener('dragstart',e=>{
    imagenEnMovimiento=e.target;
});

puzzle.addEventListener('dragover',e =>{
    e.preventDefault();
    e.target.classList.add('hover');
});

puzzle.addEventListener('dragleave',e=>{
    e.target.classList.remove('hover');
});

puzzle.addEventListener('drop',e=>{
    // console.log(imagenEnMovimiento.id.split("."));
    var idIMG=imagenEnMovimiento.id.split("-")[1];
    e.target.classList.remove("hover");
    if(idIMG==e.target.id){
        e.target.appendChild(imagenEnMovimiento);
        terminado--;
        if(terminado==0){
            document.body.classList.add('ganaste');
        }
    }
});

*/