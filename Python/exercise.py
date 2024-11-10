# Proyecto 3 meses - Ricitos
import tkinter as tk
import random
import math

WIDTH = 800
HEIGHT = 800
BACKGROUND = "black"
SIZE_PARTICLES = 6
NUMBER_PARTICLES = 700
COLOR_PARTICLES = "#FF1493"

def posicion_corazon(t):
    x = 16 * math.sin(t) ** 3
    y = 13 * math.cos(t) - 5 * math.cos(2 * t) - 2 * math.cos(3 * t) - math.cos(4 * t)
    return x, y

class Particula:
    def __init__(self, canvas):
        self.canvas = canvas
        self.id = None
        self.posicion = [random.randint(0, WIDTH), random.randint(0, HEIGHT)]
        self.destino = [0, 0]
        self.definir_destino()
        self.moviendo = True

    def definir_destino(self):
        t = random.uniform(0, 2 * math.pi)
        x, y = posicion_corazon(t)
        self.destino[0] = WIDTH // 2 + int(x * 20)
        self.destino[1] = HEIGHT // 2 - int(y * 20)

    def mover(self):
        if self.moviendo:
            dx = (self.destino[0] - self.posicion[0]) * 0.05
            dy = (self.destino[1] - self.posicion[1]) * 0.05
            self.posicion[0] += dx
            self.posicion[1] += dy
            if self.id is None:
                self.id = self.canvas.create_oval(
                    self.posicion[0], self.posicion[1],
                    self.posicion[0] + SIZE_PARTICLES, self.posicion[1] + SIZE_PARTICLES,
                    fill=COLOR_PARTICLES, outline=""
                )
            else:
                self.canvas.coords(
                    self.id,
                    self.posicion[0], self.posicion[1],
                    self.posicion[0] + SIZE_PARTICLES, self.posicion[1] + SIZE_PARTICLES
                )

            if abs(self.destino[0] - self.posicion[0]) < 1 and abs(self.destino[1] - self.posicion[1]) < 1:
                self.moviendo = False

class CorazonParticulas:
    def __init__(self, root):
        self.canvas = tk.Canvas(root, width=WIDTH, height=HEIGHT, bg=BACKGROUND)
        self.canvas.pack()
        self.particulas = [Particula(self.canvas) for _ in range(NUMBER_PARTICLES)]
        self.actualizar()
        self.mensaje_mostrado = False
        self.sombra_visible = True
        self.sombra_ids = []

    def actualizar(self):
        todas_estaticas = True
        for particula in self.particulas:
            particula.mover()
            if particula.moviendo:
                todas_estaticas = False
        if todas_estaticas and not self.mensaje_mostrado:
            self.mostrar_mensaje()
        else:
            self.canvas.after(20, self.actualizar)

    def mostrar_mensaje(self):
        texto = "     Felices 3 meses\n  mi Ricitos pechocha 💗"
        x_centro, y_centro = WIDTH // 2, HEIGHT // 2
        self.sombra_color = "#FF69B4"
        self.texto_color = "gold"

        self.sombra_ids = []
        for dx, dy in [(-2, -2), (-2, 2), (2, -2), (2, 2)]:
            sombra_id = self.canvas.create_text(
                x_centro + dx, y_centro + dy,
                text=texto, fill=self.sombra_color, font=("Comic Sans MS", 32, "bold")
            )
            self.sombra_ids.append(sombra_id)
        
        self.canvas.create_text(
            x_centro, y_centro,
            text=texto, fill=self.texto_color, font=("Comic Sans MS", 32, "bold")
        )

        self.mensaje_mostrado = True
        self.parpadear_sombra()

    def parpadear_sombra(self):
        if self.sombra_visible:
            for sombra_id in self.sombra_ids:
                self.canvas.itemconfigure(sombra_id, state="hidden")
            self.sombra_visible = False
        else:
            for sombra_id in self.sombra_ids:
                self.canvas.itemconfigure(sombra_id, state="normal")
            self.sombra_visible = True

        self.canvas.after(500, self.parpadear_sombra)

root = tk.Tk()
root.title("Corazón de Partículas")
app = CorazonParticulas(root)
root.mainloop()
