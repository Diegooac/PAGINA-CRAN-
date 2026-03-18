document.getElementById("formulario").addEventListener("submit", function(e){
    e.preventDefault();

    enviaFormRecibeJson("php/guardar.php", this, (res) => {
        // 1. Primero actualizamos el texto en el HTML (opcional)
        document.getElementById("mensaje").innerText = res.mensaje;

        // 2. Verificamos si la respuesta trae el nombre y apellido
        if (res.nombre && res.apellidop) {
            
            // 3. Mostramos la alerta con los datos dinámicos
            alert("El alumno " + res.nombre + " " + res.apellidop + " ha sido registrado.");

            // 4. Redirigimos a la otra página
            window.location.href = 'Calificaciones.html';
        }
    });
});