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
                maxLength: "El nombre de usuario debe contener 10 caracteres maximo"
            },
            email: {
                required: "El email es requerido",
                email: "El email no es valido",
                maxLength: "El email debe contener 50 caracteres maximo"
            },
            contra: {
                required: "La contraseña es requerida",
                minlength: "La contraseña debe contener al menos 8 caracteres",
                maxLength: "La contraseña debe contener 20 caracteres maximo"
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