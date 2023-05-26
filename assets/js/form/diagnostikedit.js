var base_url_tag = global_url+'document/';
var idagen = $('#id').val();
$(function() {
 
    
    if ($('#myModal').length > 0) {
        $('#myModal').modal();                     
        $('#myModal').modal('show'); 
    }
    
    $("#menu_transaksi").addClass("active");
    $("#menu_transaksi_document").addClass("active");
    $(".select2").select2();
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
    $('#date1').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        daysOfWeekDisabled: [0, 6],
    });
    $('#date2').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        daysOfWeekDisabled: [0, 6],
    });     
     
    
    $( "#id_surat" ).change(function() {
         var id_surat = $( "#id_surat" ).val();
          if(id_surat == "surat masuk") {
                $("#formnomor").css("display", "inline");
            } else {
                 $("#formnomor").css("display", "none");
            }
         if(id_surat != 0){
//            loadDataAgen(id_surat);
//            $(".pilih_barang").removeAttr("disabled");
            $("#add_barang").css("display","inline");
            resetBarang();
         }
         else{
            $(".pilih_barang").attr("disabled","disabled");
            $("#add_barang").css("display","none");
            resetBarang();
         }
         
      });
       CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
});
function removeBarang(id){
    var dly = 50;
    $("#"+id).remove();
}