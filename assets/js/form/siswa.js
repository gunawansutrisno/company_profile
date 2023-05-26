var base_url_tag = global_url + 'dokter/';
var idagen = $('#id').val();
$(function () {
    if ($('#myModal').length > 0) {
        $('#myModal').modal();
        $('#myModal').modal('show');
    }
    $("#menu_transaksi").addClass("active");
    $("#menu_transaksi_input").addClass("active");
    $(".select2").select2();
    $(document).ready(function () {
        $("#telp").keypress(function (data) {
            if (data.which != 8 && data.which != 0 && (data.which < 48 || data.which > 57))
            {
                $("#pesan").html("isikan angka").show().fadeOut("slow");
                return false;
            }
        });
    });
    $(document).ready(function () {
        $('#edit-data').on('show.bs.modal', function (event) {
            var rowid = $(event.relatedTarget).data('id');
            var url = base_url_tag + "getCekSiswa/";
            $.ajax({
                url: url,
                type: "POST",
                data: 'rowid=' + rowid,
                success: function (data) {
                    $('.fetched-data').html(data);
                }
            })
        });
    });
    $(document).ready(function () {
        $('#detail-data').on('show.bs.modal', function (event) {
            var rowid = $(event.relatedTarget).data('id');
            var url = base_url_tag + "getDetSiswa/";
            $.ajax({
                url: url,
                type: "POST",
                data: 'rowid=' + rowid,
                success: function (data) {
                    $('.fetched-data').html(data);
                }
            })
        });
    });
    $(document).ready(function () {
        $('#delete-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget).data('id');
            var url = base_url_tag + "delete/" + div;
            var modal = $(this)
            modal.find('#hapus-true-data').attr("href", url);
        })
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
        ajax: {
            url: base_url_tag + 'getDataSiswaAll/',
        },
        columns: [
            {data: 'code'},
            {data: 'judul'},
            {data: 'jenis'},
            {data: 'revisi'},
            {data : 'status'},
            {data : 'createddate'},
            {data : 'updateddate'},
            {data: 'action'},
        ]
    });

//    $('#btnFilter').click(function () {
//        dataGrid.api().ajax.reload();
//    });

});
