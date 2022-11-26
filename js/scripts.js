// validador del formato de un campo de correo

function valmail() {
    const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let tp = $("#mail").val();
    if (!re.test(String(tp).toLowerCase())) {
        jQuery("#errmail").css("color", "#A80521");
        jQuery("#userMail").css("color", "#A80521");
        jQuery("#userMail").css("border-color", "#A80521");
        $("#errmail").html(" (Fromato de correo no valido) ");
    } else {
        jQuery("#errmail").css("color", "#069169");
        jQuery("#userMail").css("color", "#069169");
        jQuery("#userMail").css("border-color", "#069169");
        $("#errmail").html(" (Formato de correo valido) ");
    }
}

// Validador de lo caracteres aceptados en un campo de correo

function soloMail(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "@abcdefghijklmnñopqrstuvwxyz1234567890.-_$";
    especiales = [];

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) return false;
}

// Validador de correo y contraseña del consejero

function validaConsejero() {
    var formData = new FormData($("form#validacion")[0]);
    $.ajax({
        url: "util/validaConsejero.php",
        type: "POST",
        data: formData,
        async: false,
        success: function(data) {
            if (data == "0") {
                $("#showerror").html("Información erronea");

                function hideMsg() {
                    $("#showerror").html("");
                }
                setTimeout(hideMsg, 3000);
            } else {
                window.location.href = "consultAgenda.php";
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });
    return false;
}

// muestra detalle de la cita

function showDetalleCita(x) {
    var x = document.getElementById("reservado" + x);
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

// ELIMINAR un turno de cita no reservado

function eliminar(x) {
    var id = x;
    jQuery.ajax({
        url: "util/eliminaCitas.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function(data) {
            window.location.reload(true);
            // $("#idname").html(data);
        },
        error: function() {},
    });
}

// CANCELAR una cita reservada

function cancelar(x) {
    var id = x;
    jQuery.ajax({
        url: "util/cancelarCitas.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function(data) {
            window.location.reload(true);
            // $("#error").html(data);
        },
        error: function() {},
    });
}

// marcar una cita como AUSENTE 

function ausente(x) {
    var id = x;
    jQuery.ajax({
        url: "util/ausenteCitas.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function(data) {
            window.location.reload(true);
            // $("#error").html(data);
        },
        error: function() {},
    });
}

// Formulario para TRANSFERIR una cita a otro asesor o consejero

function transferir(x, c) {
    var id = x;
    var cid = c;
    jQuery.ajax({
        url: "util/transfiereCitas.php",
        type: "POST",
        data: {
            id: id,
            cid: cid,
        },
        success: function(data) {
            // window.location.reload(true);
            $("#ventanaAux" + id).html(data);
        },
        error: function() {},
    });
}

// Ejecutar la Transferencia

function hacerTransferencia(x) {
    var id = x;
    var asesor = $("#asesor").val();
    jQuery.ajax({
        url: "util/hacerTransferencia.php",
        type: "POST",
        data: {
            id: id,
            asesor: asesor,
        },
        success: function(data) {
            window.location.reload(true);
            //$("#ventanaAux" + id).html(data);
        },
        error: function() {},
    });
}

// Formulario para enviar mensaje
function mensaje(x, t) {
    var id = x;
    var type = t;
    jQuery.ajax({
        url: "util/escribeMensaje.php",
        type: "POST",
        data: {
            id: id,
            type: type,
        },
        success: function(data) {
            //window.location.reload(true);
            $("#ventanaAux" + id).html(data);
        },
        error: function() {},
    });
}

// Conecta con el proceso de enviar el mensaje

function enviarMensaje(x, t) {
    var id = x;
    var type = t;
    var memo = $("#memo").val();
    jQuery.ajax({
        url: "util/enviarMensaje.php",
        type: "POST",
        data: {
            id: id,
            type: type,
            memo: memo,
        },
        success: function(data) {
            // window.location.reload(true);
            $("#labelexito").html("MENSAJE ENVIADO");

            function hideMsg() {
                $("#ventanaAux" + id).html(data);
            }
            setTimeout(hideMsg, 3000);
        },
        error: function() {},
    });
}


// // // // // // // // // // // 

function temp() {
    var estado = $("#estado").val();
    jQuery.ajax({
        url: "util/selectCiudad.php",
        type: "POST",
        data: {
            estado: estado,
        },
        success: function(data) {
            $("#selectCiudad").html(data);
        },
        error: function() {},
    });
}