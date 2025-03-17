document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("reservaForm").addEventListener("submit", function(event) {
        const nombre = document.getElementById("nombre").value.trim();
        const fecha = document.getElementById("fecha").value;
        const personas = document.getElementById("personas").value;
        const clave = document.getElementById("clave").value;

        if (!nombre || !fecha || !personas || !clave) {
            alert("Todos los campos son obligatorios");
            event.preventDefault();
        }
    });
});