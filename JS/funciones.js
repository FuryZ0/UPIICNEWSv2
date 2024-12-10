// No modificar este archivo - funcionamiento directo con base de datos
$(document).ready(function () {
    $("#registro_for").validate({

        rules: {
            usuario: {
                required: true,
                minlength: 5,
                maxLength: 10
            },
            email: {
                required: true,
                email: true,
                maxLength: 50
            },
            contra: {
                required: true,
                minlength: 8,
                maxLength: 20
            }
        },
        messages: {
            usuario: {
                required: "El nombre de usuario es requerido",
                minlength: "El nombre de usuario debe contener al menos 5 caracteres",
                maxLength: "El nombre de usuario debe contener 10 caracteres máximo"
            },
            email: {
                required: "El email es requerido",
                email: "El email no es valido",
                maxLength: "El email debe contener 50 caracteres máximo"
            },
            contra: {
                required: "La contraseña es requerida",
                minlength: "La contraseña debe contener al menos 8 caracteres",
                maxLength: "La contraseña debe contener 20 caracteres máximo"
            }
        }
    });
});

$('#check').change(function () {
   if ($(this).is(":checked")) {
       document.getElementById("nuevacontra").disabled = false;
       document.getElementById("nuevacontra").required = true;
   } else {
       document.getElementById("nuevacontra").disabled = true;
       document.getElementById("nuevacontra").value = "";
       document.getElementById("nuevacontra").required = false;
   }
});

$('#check_elim').change(function () {
    if ($(this).is(":checked")) {
        document.getElementById("block_uno").disabled = false;
        document.getElementById("block_uno").required = true;
        document.getElementById("block_dos").disabled = false;
        document.getElementById("block_dos").required = true;
    } else {
        document.getElementById("block_uno").disabled = true;
        document.getElementById("block_dos").disabled = true;
        document.getElementById("block_uno").value = "";
        document.getElementById("block_dos").value = "";
    }
});

$('#actualizar').click(function () {
    var recolec = $('#cambiar').serialize();

    $.ajax({
        url: '../php/actualizar.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {

            if (vs == "1") {
                alertify.success("Datos actualizados");
                $('#tabla_user').load('../Nav/usuario.php #tabla_user');
                $('#mod_per').modal('hide');
            } else if (vs == "2") {
                alertify.success("Datos y contraseña actualizados");
                $('#tabla_user').load('../Nav/usuario.php #tabla_user');
                $('#mod_per').modal('hide');
            } else {
                alertify.error("La contraseña no es la correcta");
            }
        }
    })
});

$(document).ready(function () {

    $("#registro_eve").validate({

        rules: {
            nombreev: {
                required: true,
                minlength: 10,
                maxLength: 50
            },
            imagen: {
                required: true,
                extension: "jpg|jpeg|png"
            },
            descripev: {
                required: true,
                minlength: 10,
                maxLength: 100
            },
            diaev: {
                required: true
            },
            horain: {
                required: true
            },
            horafin: {
                required: true
            },
            linkred1: {
                required: true,
                maxLength: 100,
                url: true
            },
            linkred2: {
                required: true,
                maxLength: 100,
                url: true
            }
        },
        messages: {
            nombreev: {
                required: "El título es requerido",
                minlength: "El título debe contener al menos 10 caracteres",
                maxLength: "El título debe contener 50 caracteres máximo"
            },
            imagen: {
                required: "La imagen es requerida",
                extension: "Solo archivos con extensión jpg, jpeg o png"
            },
            descripev: {
                required: "La descripción es requerida",
                minlength: "La descripción debe contener al menos 10 caracteres",
                maxLength: "La descripción debe contener 50 caracteres máximo"
            },
            diaev: {
                required: "El día es requerido"
            },
            horain: {
                required: "La hora de inicio es requerida"
            },
            horafin: {
                required: "La hora de finalización es requerida"
            },
            linkred1: {
                required: "El link de la red social uno es requerida",
                maxLength: "El link debe contener máximo 100 caracteres",
                url: "Solo links"
            },
            linkred2: {
                required: "El link de la red social dos es requerida",
                maxLength: "El link debe contener máximo 100 caracteres",
                url: "Solo links"
            }
        }
    });
});