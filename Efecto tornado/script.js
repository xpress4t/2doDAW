class Particle {
    constructor(x, y, char) {
        this.x = x;
        this.y = y;
        this.char = char;
        this.baseX = x;
        this.baseY = y;
        this.density = (Math.random() * 30) + 1;
        this.size = 16;
        this.angle = Math.random() * Math.PI * 2;
    }

    draw(ctx) {
        ctx.fillStyle = '#e91e63'; // Color del texto
        ctx.font = '16px "Times New Roman"';
        ctx.fillText(this.char, this.x, this.y);
    }

    update(mouse) {
        let dx = mouse.x - this.x;
        let dy = mouse.y - this.y;
        let distance = Math.sqrt(dx * dx + dy * dy);

        const maxDistance = 100; 
        const minDistance = 5;
        const gravitationalPull = 2;
        
        if (distance < maxDistance) {
            let force = (1 - distance / maxDistance) * gravitationalPull;
            this.angle += 0.05 * force;
            
            if (distance > minDistance) {
                let forceDirectionX = dx / distance;
                let forceDirectionY = dy / distance;
                
                this.x += forceDirectionX * force * this.density;
                this.y += forceDirectionY * force * this.density;
                
                this.x += Math.cos(this.angle) * force;
                this.y += Math.sin(this.angle) * force;
            } else {
                this.x += Math.cos(this.angle) * 2;
                this.y += Math.sin(this.angle) * 2;
            }
        } else {
            if (this.x !== this.baseX) {
                let dx = this.x - this.baseX;
                this.x -= dx / 20;
            }
            if (this.y !== this.baseY) {
                let dy = this.y - this.baseY;
                this.y -= dy / 20;
            }
        }
    }
}

// Texto de la carta
const text = `Ella es muy dulce, una chica muy especial, de esas que no se encuentran fácilmente. 
Tiene un corazón enorme, lleno de amor, de luz, de emociones puras que fluyen sin límites. 
Es alguien que siente mucho, que vive cada emoción con intensidad, que no teme amar con todo su ser. 
Cuando quiere, lo hace de verdad, sin mitades, sin reservas, sin condiciones. 
Su amor es sincero, profundo, y quienes tienen la suerte de recibirlo saben que es un tesoro invaluable.

Es de esas personas que iluminan la vida de los demás con solo estar. 
Tiene una manera única de hacer sentir a quienes la rodean especiales, importantes, queridos. 
Sus palabras son cálidas, su voz es un refugio, y su risa… 
su risa es capaz de alegrar hasta el día más gris. 
No necesita hacer grandes cosas para demostrar su amor; lo hace en los pequeños detalles, en la forma en que escucha, en cómo cuida, en cómo se preocupa por los que ama.

Ella no es indiferente a nada. Siente la vida de una manera distinta, con el alma abierta, con el corazón expuesto. 
A veces sufre más de lo que debería, porque el mundo no siempre entiende a quienes sienten tanto. Pero aun así, sigue amando, 
sigue creyendo en la belleza de las cosas, en la bondad de las personas, en los finales felices. No deja que las heridas la vuelvan fría; 
al contrario, cada cicatriz la hace más fuerte, más sabia, más hermosa.

Cuando ama, lo hace con todo. No teme entregarse, no teme demostrar lo que siente. Es leal, sincera, transparente. 
No juega con los sentimientos de nadie, porque entiende el valor del amor y lo respeta. No dice "te quiero" por decirlo; cuando lo dice, 
es porque lo siente desde lo más profundo de su alma. Y no hay nada más puro que su amor, porque no está basado en condiciones ni en expectativas; 
ama porque le nace, porque es parte de ella, porque su corazón no sabe hacerlo de otra manera.
`;

// Configuración de partículas y ratón
let particles = [];
let mouse = { x: null, y: null, radius: 100 };

function init() {
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    ctx.textAlign = 'center'; // Centra el texto
    const textLines = text.split('\n');
    const lineSpacing = 40; // Espacio entre líneas
    const startX = canvas.width / 2; // Centra horizontalmente
    const startY = canvas.height / 2 - (textLines.length * lineSpacing) / 2; // Centra verticalmente

    textLines.forEach((line, lineIndex) => {
        const characters = line.split('');
        const charSpacing = 10; // Espacio entre letras
        const lineWidth = characters.length * charSpacing;
        const lineX = startX - lineWidth / 2; // Centra cada línea

        characters.forEach((char, i) => {
            const x = lineX + i * charSpacing;
            const y = startY + lineIndex * lineSpacing;
            particles.push(new Particle(x, y, char));
        });
    });
}

function animate() {
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpia la pantalla

    particles.forEach(particle => {
        particle.update(mouse);
        particle.draw(ctx);
    });

    requestAnimationFrame(animate);
}

// Eventos de ratón y redimensionado
window.addEventListener('mousemove', event => {
    mouse.x = event.x;
    mouse.y = event.y;
});

window.addEventListener('resize', () => {
    particles = [];
    init();
});

// Inicia la animación
init();
animate();