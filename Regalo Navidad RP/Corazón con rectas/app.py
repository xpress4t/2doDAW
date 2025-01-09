import math
from turtle import *

def hearta(k):
    return 15 * math.sin(k) ** 3

def heartb(k):
    return 11.8*math.cos(k) - 5 * (
        math.cos(2*k) - 2*math.cos(3*k) - math.cos(4*k)
    )

speed(0)
pensize(2)
bgcolor("white")

fillcolor("red")
for i in range(10000):
    x = hearta(i) * 30
    y = heartb(i) * 30
    goto(x, y)
done()