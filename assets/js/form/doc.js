var base_url_tag = global_url + 'document/';
var idagen = $('#id').val();
$(function () {
    if ($('#myModal').length > 0) {
        $('#myModal').modal();
        $('#myModal').modal('show');
    }
    $("#menu_transaksi").addClass("active");
    $("#menu_transaksi_document").addClass("active");
    $(".select2").select2();
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
    $.ajaxSetup({
        type: "POST",
        url: base_url_tag + "getambil_data",
        cache: false,
    });

    $("#kategori").change(function () {
        var value = $(this).val();
        if (value > 0) {
            $.ajax({
                data: {
                    modul: 'kabupaten',
                    id: value
                },
                success: function (respond) {
                    $("#subkategori").html(respond);
                }
            })
        }

    });


    $("#subkategori").change(function () {
        var value = $(this).val();
        if (value > 0) {
            $.ajax({
                data: {modul: 'kecamatan', id: value},
                success: function (respond) {
                    $("#jenis").html(respond);
                }
            })
        }
    });

//    $("#kecamatan").change(function () {
//    });
});
 