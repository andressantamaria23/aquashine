const formulario = document.querySelector('#Registrarse');

formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    email();
});

function email() {
    const datos = new FormData(formulario);
    fetch('phpmailer/form2/emailRegister.php', {
        method: 'POST',
        body: datos
    })
    .then(res => res.json())  // Esperamos recibir JSON
    .then(res => {
        console.log(res);

        if (res.exito) {      // Verificamos si la propiedad 'exito' es verdadera
            console.log('Mensaje enviado');
        } else {
            console.log('Mensaje no enviado');
        }
    })
    .catch(error => {
        console.error('Error al procesar la respuesta:', error);
    });
}
