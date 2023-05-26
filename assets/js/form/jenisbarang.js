var base_url_tag = global_url+'Submenu/';

$(function() {
    if ($('#myModal').length > 0) {
        $('#myModal').modal();                     
        $('#myModal').modal('show');  
    }

   $('#formworkorder').on('keypress', function(e){
        return e.which !== 13;
    });
    $(".select2").select2();
     $("#menu_data").addClass("active");
    $("#menu_data_submenu").addClass("active"); 
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
    $("#formicd").submit(function(){
        var id = $("#id").val();
        var name = $("#name").val();
        if(id == ""){
           if(name == ""){
               alert("Main Menu Tidak boleh kosong!");
               return false;
           }
           return true;
        }
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
        $("#form-head").html("Edit Data ICD ");
        $("#id").val(msg.id);
        $("#menu_id").val(msg.menu_id);
        $("#name").val(msg.submenu);
        console.log(msg);
         $("#batal").css("display","inline");
         } else {
              $("#batal").css("display","none");
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