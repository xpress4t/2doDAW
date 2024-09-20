/*
Objetivo: El objetivo de esta práctica es crear un programa de gestión de tareas para ayudar a un valiente aventurero a organizar y seguir el progreso de sus emocionantes misiones en un mundo lleno de peligros y desafíos.

Descripción: Nuestro valiente aventurero se embarca en innumerables misiones en su búsqueda de tesoros y la derrota de malvados villanos. Sin embargo, necesita una forma de llevar un registro de sus tareas pendientes y completadas. En esta práctica, se te pide crear un programa que le permita al aventurero agregar, eliminar, mostrar y marcar como completadas las tareas relacionadas con sus misiones.

Requisitos:
	
	-El programa no debe lanzar ninguna excepción. Haz las comprobaciones necesarias de todos los datos.

	-El programa debe incluir un array llamado tareas que almacenará las tareas del aventurero. Cada tarea será representada por un objeto que incluirá propiedades como 'id', 'nombre', 'descripcion', 'fecha' y 'completada'.

	-El programa debe proporcionar una función agregarTarea que permita al aventurero agregar nuevas tareas a su lista. Esta función debe solicitar al aventurero que ingrese el 'nombre' de la nueva tarea, una breve descripción y la fecha límite de la tarea. Luego, debe crear un objeto de tarea con las propiedades correspondientes y agregarlo al array tareas.

	-El programa debe proporcionar una función eliminarTarea que permita al aventurero eliminar tareas de su lista. Esta función debe solicitar al aventurero que ingrese el ID de la tarea que desea eliminar y buscar esa tarea en el array tareas por su ID. Una vez encontrada, debe eliminarla del array.

	-El programa debe proporcionar una función mostrarTareas que muestre todas las tareas almacenadas en el array tareas. Esta función debe mostrar el ID, nombre, descripción, fecha límite y estado de completado de cada tarea.

	-El programa debe proporcionar una función marcarTareaCompletada que permita al aventurero marcar una tarea como completada. Esta función debe solicitar al aventurero que ingrese el ID de la tarea que desea marcar y buscar esa tarea en el array tareas por su ID. Una vez encontrada, debe cambiar el estado de completado de la tarea a true.

Con estos requisitos, nuestro aventurero estará preparado para enfrentar los desafíos y mantenerse organizado en su búsqueda de la gloria y los tesoros ocultos en este vasto mundo de aventuras.

*/

var tareas = [];

function agregarTarea() {
  var nombre = prompt("Ingrese el nombre de la tarea:");
  var descripcion = prompt("Ingrese la descripción de la tarea:");
  var fecha = prompt("Ingrese la fecha de la tarea:");
  var completada = confirm("¿La tarea está completada?");

  var tarea = {
    id: generarId(),
    nombre: nombre,
    descripcion: descripcion,
    fecha: fecha,
    completada: completada
  };

  tareas.push(tarea);
  alert("Tarea agregada correctamente.");
}

function eliminarTarea() {
  var id = prompt("Ingrese el ID de la tarea que desea eliminar:");
  var tareaEncontrada = false;

  for (var i = 0; i < tareas.length; i++) {
    if (tareas[i].id === id) {
      tareas.splice(i, 1);
      tareaEncontrada = true;
      alert("Tarea eliminada correctamente.");
      break;
    }
  }

  if (!tareaEncontrada) {
    alert("No se encontró ninguna tarea con el ID especificado.");
  }
}

function mostrarTareas() {
  if (tareas.length === 0) {
    alert("No hay tareas registradas.");
  } else {
    var mensaje = "Lista de tareas:\n\n";

    tareas.forEach(function(tarea) {
      mensaje += "ID: " + tarea.id + "\n";
      mensaje += "Nombre: " + tarea.nombre + "\n";
      mensaje += "Descripción: " + tarea.descripcion + "\n";
      mensaje += "Fecha: " + tarea.fecha + "\n";
      mensaje += "Completada: " + (tarea.completada ? "Sí" : "No") + "\n\n";
    });

    alert(mensaje);
  }
}

function marcarTareaCompletada() {
  var id = prompt("Ingrese el ID de la tarea que desea marcar como completada:");
  var tareaEncontrada = false;

  for (var i = 0; i < tareas.length; i++) {
    if (tareas[i].id === id) {
      tareas[i].completada = true;
      tareaEncontrada = true;
      alert("Tarea marcada como completada.");
      break;
    }
  }

  if (!tareaEncontrada) {
    alert("No se encontró ninguna tarea con el ID especificado.");
  }
}

function generarId() {
  return "_" + Math.random().toString(36).substr(2, 9);
}

// Ejemplo de uso
var opcion;

do {
  opcion = parseInt(prompt(
    "Seleccione una opción:\n" +
    "1. Agregar tarea\n" +
    "2. Eliminar tarea\n" +
    "3. Mostrar tareas\n" +
    "4. Marcar tarea como completada\n" +
    "5. Salir"
  ));

  switch (opcion) {
    case 1:
      agregarTarea();
      break;
    case 2:
      eliminarTarea();
      break;
    case 3:
      mostrarTareas();
      break;
    case 4:
      marcarTareaCompletada();
      break;
    case 5:
      alert("¡Hasta luego!");
      break;
    default:
      alert("Opción inválida. Intente nuevamente.");
      break;
  }
} while (opcion !== 5);
