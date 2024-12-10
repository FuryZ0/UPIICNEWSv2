// No modificar este archivo - funcionamiento directo con base de datos
function modificar(arreglo) {
    cadena = arreglo.split(',');

    $("#id_").val(cadena[0]);
    $("#usuario_").val(cadena[1]);
    $("#email_").val(cadena[2]);
    $("#contra_").val(cadena[3]);
    $("#rol_").val(cadena[4]);
}

$('#modificar_adm').click(function () {
    var recolec = $('#form_adm').serialize();

    $.ajax({
        url: '../php/adm_modf.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {
            $('#table_adm').load('../Nav/CRUD.php #table_adm');
            $('#editar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

$('#agregar_adm').click(function () {
    var recolec = $('#form_agr').serialize();

    $.ajax({
        url: '../php/adm_agregar.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {
            $('#table_adm').load('../Nav/CRUD.php #table_adm');
            $('#agregar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

function eliminar(arreglo) {
    cadena = arreglo.split(',');

    $("#id_elim").val(cadena[0]);
    $("#usuario_elim").val(cadena[1]);
    $("#email_").val(cadena[2]);
    $("#contra_").val(cadena[3]);
    $("#rol_").val(cadena[4]);
}


$('#confim_elim').click(function () {
    var recolec = $('#enviar_elim').serialize();

    $.ajax({
        url: '../php/adm_eliminar.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {
            $('#table_adm').load('../Nav/CRUD.php #table_adm');
            $('#eliminar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

function eliminar_ev(arreglo) {
    cadena = arreglo.split(',');

    $("#id_elimev").val(cadena[0]);
    $("#nombre_elimev").val(cadena[1]);
}


$('#confim_elimev').click(function () {
    var recolec = $('#elim_ev').serialize();

    $.ajax({
        url: '../php/EliminarEv.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {
            location.reload();
            $('#eliminar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});