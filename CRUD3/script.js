document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("usuarioForm");

    form.addEventListener("submit", function(event) {
        let nombre = document.getElementById("nombre").value.trim();
        let apellido = document.getElementById("apellido").value.trim();
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
        let email = document.getElementById("email").value.trim();

        if (nombre === "" || apellido === "" || username === "" || password === "" || email === "") {
            event.preventDefault();
            alert("Todos los campos son obligatorios.");
            return;
        }

        if (password.length < 6) {
            event.preventDefault();
            alert("La contraseña debe tener al menos 6 caracteres.");
            return;
        }

        if (!email.includes("@")) {
            event.preventDefault();
            alert("Ingrese un correo válido.");
            return;
        }
    });

    document.querySelectorAll(".eliminar").forEach(button => {
        button.addEventListener("click", function(event) {
            if (!confirm("¿Estás seguro de eliminar este usuario?")) {
                event.preventDefault();
            }
        });
    });
});
