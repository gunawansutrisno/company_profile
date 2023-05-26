var base_url_tag = global_url+'menu/';

$(function() {
    if ($('#myModal').length > 0) {
        $('#myModal').modal();                     
        $('#myModal').modal('show');  
    }
     $.ajaxSetup({
        type: "POST",
        url: base_url_tag + "getambil_data",
        cache: false,
    });

    $("#menu_id").change(function () {
        var value = $(this).val();
        if (value > 0) {
            $.ajax({
                data: {
                    modul: 'kabupaten',
                    id: value
                },
                success: function (respond) {
                    $("#submenu_id").html(respond);
                }
            })
        }

    });


    $("#kabupaten-kota").change(function () {
    });

    $("#kecamatan").change(function () {
    });
   $('#formworkorder').on('keypress', function(e){
        return e.which !== 13;
    });
//      $('#menu_id').select2('data', null)
    $(".select2").select2();
     $("#menu_data").addClass("active");
    $("#menu_data_menu").addClass("active"); 
    
    $("#formicd").submit(function(){
        var id = $("#id").val();
        var name = $("#name").val();
        if(id == ""){
           if(name == ""){
               alert("ChildMain Menu Tidak boleh kosong!");
               return false;
           }
           return true;
        }
    });
    $(document).ready(function () {
        $('#active-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget).data('id');
            var url = base_url_tag + "active/" + div;
            var modal = $(this)
            modal.find('#simpan-true-data').attr("href", url);
        })
    });
    $(document).ready(function () {
        $('#deactive-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget).data('id');
            var url = base_url_tag + "deactive/" + div;
            var modal = $(this)
            modal.find('#simpan-true-data').attr("href", url);
        })
    });
    var dataGrid = $('#datatable').dataTable({
        processing: true,
        responsive: true,
        serverSide: false,
        searching: true,
        ajax : {
            url : base_url_tag + 'ajax_list/',
            type : 'post',
            data:  function(d){
                d.IDprovinsi = $('#IDprovinsi').val();
            }
        },
          
    columnDefs: [
            { 
                targets : [ -1 ], //last column
                orderable: false, //set not orderable
            },
        ],

         
    });

    $('#btnFilter').click(function() {        
        dataGrid.api().ajax.reload();
    });
});
function loadData(url) {
  
    $.ajax({
        url: url
    })
    .done(function( msg ) {
        var segments = url.split( '/' );
        var action = segments[3];
        var controller = segments[4];
        var fungsi = segments[5];
        var id = segments[6];
        if(id != 0) {
        $("#form-head").html("Edit Data ");
        $("#id").val(msg.id);
        $("#menu_id").val(msg.menu_id);
        $("#submenu_id").val(msg.submenu_id);
        $("#name").val(msg.mainmenu);
        console.log(msg);
         $("#batal").css("display","inline");
         $("#reset").css("display","none");
         } else {
              $("#batal").css("display","none");
              $("#reset").css("display","inline");
         }
    });
    return false;
}


function deleteData(id) {
     $('#delete-data').on('show.bs.modal', function (event) {
        var url = base_url_tag+"delete/"+id;
        var modal = $(this)
        modal.find('#hapus-true-data').attr("href",url);
        })
    }