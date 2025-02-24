def mostrar_tablero(tablero):
    for fila in tablero:
        # .join(fila) agrega una barra vertical a cada elemento de la fila
        print(" | ".join(fila)) #Se imprime la fila con barras verticales
        print("-" * 9) #Se imprime una línea de 9 guiones


def hay_ganador(tablero, jugador):
    # Verificar filas, columnas y diagonales
    for i in range(3):
        if all([casilla == jugador for casilla in tablero[i]]):
            return True
        if all([tablero[j][i] == jugador for j in range(3)]):
            return True

    if tablero[0][0] == tablero[1][1] == tablero[2][2] == jugador:
        return True
    if tablero[0][2] == tablero[1][1] == tablero[2][0] == jugador:
        return True

    return False

def tablero_lleno(tablero):
    return all(casilla != " " for fila in tablero for casilla in fila)

def tres_en_raya():
    tablero = [[" "] * 3 for _ in range(3)]
    jugadores = ["X", "O"]
    turno = 0

    while True:
        mostrar_tablero(tablero)
        jugador = jugadores[turno % 2]
        print(f"Turno del jugador {jugador}")

        try:
            fila = int(input("Ingresa la fila (0-2): "))
            columna = int(input("Ingresa la columna (0-2): "))
        except ValueError:
            print("Por favor, ingresa un número válido.")
            continue

        if fila not in range(3) or columna not in range(3):
            print("Coordenadas fuera de rango. Intenta de nuevo.")
            continue

        if tablero[fila][columna] != " ":
            print("Esa casilla ya está ocupada. Elige otra.")
            continue

        tablero[fila][columna] = jugador

        if hay_ganador(tablero, jugador):
            mostrar_tablero(tablero)
            print(f"¡Jugador {jugador} ha ganado!")
            break

        if tablero_lleno(tablero):
            mostrar_tablero(tablero)
            print("¡Empate! No quedan más movimientos.")
            break

        turno += 1

if __name__ == "__main__":
    tres_en_raya()