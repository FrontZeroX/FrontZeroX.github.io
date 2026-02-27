document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("contactForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("php/enviar.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const respuesta = document.getElementById("respuesta");

            if (data.status === "success") {
                respuesta.innerHTML =
                    "<div style='color:green;'>Mensaje enviado correctamente</div>";
                form.reset();
            } else {
                respuesta.innerHTML =
                    "<div style='color:red;'>Error al enviar</div>";
            }
        })
        .catch(() => {
            document.getElementById("respuesta").innerHTML =
                "<div style='color:red;'>Error del servidor</div>";
        });

    });

});