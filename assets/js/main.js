document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("contactForm");
    const messageBox = document.getElementById("form-message");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {

            if (data.trim() === "OK") {
                messageBox.innerHTML =
                    "<div style='color:green;'>Mensaje enviado correctamente</div>";
                form.reset();
            } else {
                messageBox.innerHTML =
                    "<div style='color:red;'>Error al enviar</div>";
            }

        })
        .catch(error => {
            messageBox.innerHTML =
                "<div style='color:red;'>Error del servido</div>";
        });

    });

});
