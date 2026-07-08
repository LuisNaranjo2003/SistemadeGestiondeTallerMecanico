document.addEventListener("DOMContentLoaded", function () {

    const formulario = document.getElementById("formContacto");

    if (!formulario) return;

    formulario.addEventListener("submit", function (e) {

        e.preventDefault();

        const nombre = document.getElementById("nombre").value.trim();
        const correo = document.getElementById("correo").value.trim();
        const telefono = document.getElementById("telefono").value.trim();
        const asunto = document.getElementById("asunto").value.trim();
        const mensaje = document.getElementById("mensaje").value.trim();

        const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const telefonoRegex = /^[0-9]{10}$/;

        if (nombre.length < 3) {
            alert("Ingrese un nombre válido.");
            return;
        }

        if (!correoRegex.test(correo)) {
            alert("Ingrese un correo electrónico válido.");
            return;
        }

        if (!telefonoRegex.test(telefono)) {
            alert("Ingrese un teléfono válido de 10 dígitos.");
            return;
        }

        if (asunto.length < 5) {
            alert("Ingrese un asunto válido.");
            return;
        }

        if (mensaje.length < 10) {
            alert("El mensaje debe contener al menos 10 caracteres.");
            return;
        }

        alert("Mensaje enviado correctamente.");

        formulario.reset();

    });

});