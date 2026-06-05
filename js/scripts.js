// Versión ajustada junio 2026

function valmail() {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let tp = $("#mail").val();

    if (!re.test(String(tp).toLowerCase())) {
        $("#errmail").css("color", "#A80521");
        $("#mail").css("color", "#A80521").css("border-color", "#A80521");
        $("#errmail").html(" (Formato de correo no válido) ");
    } else {
        $("#errmail").css("color", "#069169");
        $("#mail").css("color", "#069169").css("border-color", "#069169");
        $("#errmail").html(" (Formato de correo válido) ");
    }
}

function soloMail(e) {
    let key = e.keyCode || e.which;
    let tecla = String.fromCharCode(key).toLowerCase();
    let letras = "@abcdefghijklmnñopqrstuvwxyz1234567890.-_$";

    if (letras.indexOf(tecla) == -1) return false;
}

function validaConsejero() {
    let formData = new FormData($("form#validacion")[0]);

    $.ajax({
        url: "util/validaConsejero.php",
        type: "POST",
        data: formData,
        success: function(data) {
            data = String(data).trim();

            if (data === "0") {
                $("#showerror").html("Información errónea");
                setTimeout(function() {
                    $("#showerror").html("");
                }, 3000);
            } else {
                window.location.href = "consultAgenda.php";
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
}

function showDetalleCita(id) {
    let bloque = document.getElementById("reservado" + id);

    if (!bloque) return;

    bloque.style.display = bloque.style.display === "block" ? "none" : "block";
}

function eliminar(id) {
    $.ajax({
        url: "util/eliminaCitas.php",
        type: "POST",
        data: { id: id },
        success: function() {
            window.location.reload();
        }
    });
}

function cancelar(id) {
    $.ajax({
        url: "util/cancelarCitas.php",
        type: "POST",
        data: { id: id },
        success: function() {
            window.location.reload();
        }
    });
}

function ausente(id) {
    $.ajax({
        url: "util/ausenteCitas.php",
        type: "POST",
        data: { id: id },
        success: function() {
            window.location.reload();
        }
    });
}

function transferir(id, cid) {
    $.ajax({
        url: "util/transfiereCitas.php",
        type: "POST",
        data: {
            id: id,
            cid: cid
        },
        success: function(data) {
            $("#ventanaAux" + id).html(data);
        }
    });
}

function hacerTransferencia(id) {
    let asesor = $("#asesor").val();

    if (asesor === "0") {
        alert("Seleccione un asesor");
        return false;
    }

    $.ajax({
        url: "util/hacerTransferencia.php",
        type: "POST",
        data: {
            id: id,
            asesor: asesor
        },
        success: function() {
            window.location.reload();
        }
    });
}

function mensaje(id, type) {
    $.ajax({
        url: "util/escribeMensaje.php",
        type: "POST",
        data: {
            id: id,
            type: type
        },
        success: function(data) {
            $("#ventanaAux" + id).html(data);
        }
    });
}

function enviarMensaje(id, type) {
    let memo = $("#memo").val();

    $.ajax({
        url: "util/enviarMensaje.php",
        type: "POST",
        data: {
            id: id,
            type: type,
            memo: memo
        },
        success: function(data) {
            data = String(data).trim();

            if (data === "1") {
                $("#labelexito").html("MENSAJE ENVIADO");
                setTimeout(function() {
                    $("#ventanaAux" + id).html("");
                }, 3000);
            } else {
                $("#labelexito").html("ERROR AL ENVIAR");
            }
        }
    });
}

function mensajeAdicional(id, type) {
    let memo = $("#mensajeAdicional").val();

    $.ajax({
        url: "util/enviarMensaje.php",
        type: "POST",
        data: {
            id: id,
            type: type,
            memo: memo
        },
        success: function(data) {
            data = String(data).trim();

            if (data === "1") {
                $("#msgServicio" + id).html("MENSAJE ENVIADO");
            } else {
                $("#msgServicio" + id).html("ERROR AL ENVIAR");
            }

            setTimeout(function() {
                $("#msgServicio" + id).html("");
            }, 3000);
        }
    });
}

function cargaTurnosDisponibles() {
    let id = $("#idConsejero").val();

    if (id === "0") {
        $("#mostrarTurnosDisponibles").html("");
        return false;
    }

    $.ajax({
        url: "util/cargaTurnosDisponibles.php",
        type: "POST",
        data: { id: id },
        success: function(data) {
            $("#mostrarTurnosDisponibles").html(data);
        }
    });
}

function datosReservaTurno(id) {
    $.ajax({
        url: "util/creaCitaPerInfo.php",
        type: "POST",
        data: { id: id },
        success: function(data) {
            $("#showDatosReserva").html(data);
        }
    });
}

function crearCitas(idConsejero) {
    let formData = new FormData($("form#newcita")[0]);
    formData.append("id", idConsejero);

    $.ajax({
        url: "util/crearCitas.php",
        type: "POST",
        data: formData,
        success: function(data) {
            data = String(data).trim();

            if (data === "0") {
                $("#newcitablock").html(
                    '<img src="images/ok.png" alt="Successful"><br><span class="block tac">Cita creada con éxito.</span>'
                );
            } else {
                $("#info").html(data);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
}

function efectuarReserva() {
    let formData = new FormData($("form#datosReserva")[0]);

    $.ajax({
        url: "util/efectuarReserva.php",
        type: "POST",
        data: formData,
        success: function(data) {
            data = String(data).trim();

            if (data === "0") {
                $("#showerror").html("Información errónea");

                setTimeout(function() {
                    $("#showerror").html("");
                }, 3000);
            } else {
                $("#showDatosReserva").html(
                    '<img src="images/ok.png" alt="Successful"><br><span class="block tac">Cita reservada con éxito.</span>'
                );
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
}

function mostrarReservas() {
    let formData = new FormData($("form#consultar")[0]);

    $.ajax({
        url: "util/mostrarReservas.php",
        type: "POST",
        data: formData,
        success: function(data) {
            $("#showCitasReservadas").html(data);
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
}

function numeros(e) {
    let key = e.keyCode || e.which;
    let tecla = String.fromCharCode(key).toLowerCase();
    let letras = "1234567890";

    if (letras.indexOf(tecla) == -1) return false;
}