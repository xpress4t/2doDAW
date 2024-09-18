document.addEventListener('DOMContentLoaded', () => {
    // Seleccionamos el desplegable del DOM
    const themeDropdown = document.getElementById('themeDropdown');

    // Función para cambiar el tema
    function changeTheme(theme) {
        // Eliminar cualquier clase de tema anterior del body
        document.body.classList.remove(
            'theme-analog-green',
            'theme-complement-blue-orange',
            'theme-mono-gray',
            'theme-triadic-red-blue-yellow',
            'theme-complement-purple-yellow',
            'theme-analog-red-pink',
            'theme-complement-green-pink',
            'theme-analog-blue-turquoise',
            'theme-triadic-green-purple-orange',
            'theme-complement-blue-gold',
            'theme-complement-custom'
        );
        // Añadir la clase del tema seleccionado
        document.body.classList.add(theme);
    }

    // Escuchar cambios en el desplegable
    themeDropdown.addEventListener('change', (event) => {
        const selectedTheme = event.target.value; // Obtener el valor del tema seleccionado
        changeTheme(selectedTheme); // Aplicar el tema
    });


    const fontDropdown = document.getElementById('fontDropdown');

    function changeFont(fontClass) {
        document.body.classList.remove(
            'font-roboto',
            'font-open-sans',
            'font-lora',
            'font-montserrat',
            'font-merriweather',
            'font-poppins',
            'font-playfair',
            'font-source-sans',
            'font-raleway',
            'font-georgia',
            'font-custom'
        );
        document.body.classList.add(fontClass);
    }

    fontDropdown.addEventListener('change', (event) => {
        const selectedFont = event.target.value;
        changeFont(selectedFont);
    });


});
