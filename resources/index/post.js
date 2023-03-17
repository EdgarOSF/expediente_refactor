const formulario = document.querySelector('#form-login');

formulario.addEventListener('submit', (event) => {
  event.preventDefault();

  let datos = new FormData(formulario);
  datos.append('opcion', 'iniciar_sesion');

  console.log(datos);
  console.log(datos.get('usuario'));
  console.log(datos.get('password'));
  console.log(datos.get('opcion'));

  fetch('php/loginService/index.php', { method: 'POST', body: datos })
    .then((res) => res.json())
    .then((data) => {
        console.log(data);
    });
});
