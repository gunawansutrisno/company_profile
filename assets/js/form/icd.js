var base_url_tag = global_url+'jabatan/';

$(function() {
    if ($('#myModal').length > 0) {
        $('#myModal').modal();                     
        $('#myModal').modal('show');  
    }

   $('#formworkorder').on('keypress', function(e){
        return e.which !== 13;
    });
    
     $("#menu_data").addClass("active");
    $("#menu_data_kode").addClass("active"); 
    
    $("#formicd").submit(function(){
        var id = $("#id").val();
        var name = $("#name").val();
        if(id == ""){
           if(name == ""){
               alert("Nama Jabatan Tidak boleh kosong!");
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
// alert(segments);
        var action = segments[3];
        var controller = segments[4];
        var fungsi = segments[5];
        var id = segments[6];
//        alert(id);
        if(id != 0) {
        $("#form-head").html("Edit Data ICD ");
        $("#id").val(msg.id);
        $("#name").val(msg.name);
//          $("#in_bahasa").val(msg.in_bahasa);
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