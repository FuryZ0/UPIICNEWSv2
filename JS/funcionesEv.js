// No modificar este archivo - funcionamiento directo con base de datos
function modificar(arreglo) {
    cadena = arreglo.split(',');

    $("#ide_").val(cadena[0]);
    $("#tit_").val(cadena[1]);
    $("#desc_").val(cadena[2]);
    $("#ubi_").val(cadena[3]);
    $("#tag_").val(cadena[4]);
    $("#dia_").val(cadena[6]);
    $("#horai_").val(cadena[7]);
    $("#horaf_").val(cadena[8]);
    $("#red1_").val(cadena[9]);
    $("#link1_").val(cadena[10]);
    $("#red2_").val(cadena[11]);
    $("#link2_").val(cadena[12]);
    $("#img_").val(cadena[13]);
}

$('#modificar_adm').click(function () {
    var recolec = $('#form_adm').serialize();

    $.ajax({
        url: '../php/adm_modfev.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {
            $('#table_adm').load('../Nav/CRUDEv.php #table_adm');
            $('#editar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

$('#agregar_adm').click(function () {
    var recolec = $('#form_agr').serialize();

    $.ajax({
        url: '../php/adm_agregarev.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {
            $('#table_adm').load('../Nav/CRUDEv.php #table_adm');
            $('#agregar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

function eliminar(arreglo) {
    cadena = arreglo.split(',');

    $("#id_elim").val(cadena[0]);
    $("#tit_elim").val(cadena[1]);
}


$('#confim_elim').click(function () {
    var recolec = $('#enviar_elim').serialize();

    $.ajax({
        url: '../php/adm_eliminarev.php',
        type: 'POST',
        data: recolec,

        success: function (vs) {
            $('#table_adm').load('../Nav/CRUDEv.php #table_adm');
            $('#eliminar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});