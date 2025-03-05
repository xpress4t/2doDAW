import java.util.ArrayList; 
// import java.util.Date; // Para las fechas de vacunación
import java.util.Scanner; // Para ingresar los nuevos Animales

//Funcionalidades:
// Registrar
// Actualizar
// Gestionar estados de salud
// Tratamientos

class Animal {
	// Declarando variables que se importarán a las clases Perro y Gato
	int id;
	Double peso;
	String estadoSalud;
	String especie;
	
	//Constructor
	Animal(int id,Double peso,String estadoSalud,String especie){
		this.id = id;
		this.peso = peso;
		this.estadoSalud = estadoSalud;
		this.especie = especie;
	}
	
	// Función para actualizar el peso del animal
	public void actualizarPeso(Double nuevoPeso) {
		peso = nuevoPeso;
		System.out.println("El nuevo peso del animal será: "+nuevoPeso);
	}
	// Función para actualziar el estado de salud del animal
	public void cambiarEstadoSalud(String nuevoEstado) {
		estadoSalud = nuevoEstado;
		System.out.println("Estado de salud actualizado: "+nuevoEstado);
	}
	
	public void mostrarInformacion() {
		System.out.println("ID: "+id);
		System.out.println("");
		System.out.println("");
		System.out.println("");
		System.out.println("");
	}
}