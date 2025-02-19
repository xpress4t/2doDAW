def imprimir_tablero(tablero):
    for fila in tablero:
        print(" | ".join(fila))
        print("-" * 9)

def verificar_ganador(tablero, jugador):
    # Verificar filas y columnas
    for i in range(3):
        if all(tablero[i][j] == jugador for j in range(3)) or all(tablero[j][i] == jugador for j in range(3)):
            return True
    # Verificar diagonales
    if all(tablero[i][i] == jugador for i in range(3)) or all(tablero[i][2 - i] == jugador for i in range(3)):
        return True
    return False

def tablero_lleno(tablero):
    return all(celda != " " for fila in tablero for celda in fila)

def jugar():
    tablero = [[" " for _ in range(3)] for _ in range(3)]
    jugadores = ["X", "O"]
    turno = 0
    
    while True:
        imprimir_tablero(tablero)
        jugador = jugadores[turno % 2]
        print(f"Turno del jugador {jugador}")
        
        try:
            fila, columna = map(int, input("Introduce fila y columna (0-2, separados por espacio): ").split())
            if tablero[fila][columna] != " ":
                print("Casilla ocupada, elige otra.")
                continue
        except (ValueError, IndexError):
            print("Entrada inválida, intenta de nuevo.")
            continue
        
        tablero[fila][columna] = jugador
        
        if verificar_ganador(tablero, jugador):
            imprimir_tablero(tablero)
            print(f"¡Jugador {jugador} ha ganado!")
            break
        
        if tablero_lleno(tablero):
            imprimir_tablero(tablero)
            print("¡Es un empate!")
            break
        
        turno += 1

if __name__ == "__main__":
    jugar()
