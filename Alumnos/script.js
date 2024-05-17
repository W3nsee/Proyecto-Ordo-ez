document.getElementById('boton').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    const menu_mini = document.querySelector('.menu');
    const i = document.querySelector('.nave-lista i');

    if (menu_mini.classList.contains('menu_mini')) {
        menu_mini.classList.remove('menu_mini');
    } else {
        menu_mini.classList.add('menu_mini');
    }
});

function cargarContenido(url) {
    // Cargar el contenido
    // Aquí puedes utilizar AJAX o cualquier otra técnica para cargar el contenido desde la URL
    
    // Una vez que el contenido está cargado, añadir la clase 'cargado' al contenedor
    document.getElementById('contenido').classList.add('cargado');
  }
  





