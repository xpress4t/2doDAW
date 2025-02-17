class Perro:
    def __init__(self,nombre,raza,edad):
        self.nombre=nombre
        self.raza=raza
        self.edad=edad
    def ladrar(self):
        print("Guau")
        
    def descripcion(self):
        return f"Nombre: {self.nombre}\nRaza: {self.raza}\nEdad: {self.edad}"
    
miPerro = Perro("Cliford","Doberman",3)

print(miPerro.descripcion())      

password_real = "pepito"
password_intento =""

while password_real != password_intento:
    password_intento = input("Introduce la contraseña: ")
    
    if password_real != password_intento:
        print("Contraseña incorrecta")
    else:
        print("Contraseña correcta")
        break
    