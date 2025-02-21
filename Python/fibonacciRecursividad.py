# La recursividad no es la manera más eficiente 
# ya que tiene un límite al ponerle un número muy grande

#Defino la funcion con el parámetro n
def fibonacci(n):
    if n == 0:
        return 0
    elif n==1:
        return 1
    else:
        return fibonacci(n-2) + fibonacci(n-1)
    
numero = int(input("Ingrese un número: "))
print(fibonacci(numero))