document.getElementById('boton').addEventListener('click', function() {
    var mensajeDiv = document.getElementById('mensaje');
    if (mensajeDiv.style.display === 'none') {
        mensajeDiv.style.display = 'block';
    } else {
        mensajeDiv.style.display = 'none';
    }
});
