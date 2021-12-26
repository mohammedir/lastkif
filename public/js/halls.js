/*start Project Setting and edit*/
/*{{--//TODO:: MOOM*EN S. ALDAHDOU*H 12/15/2021--}}*/
$(function () {
    const table = $('#halls-table');

    $(document).ready(function () {
        get_halls();
        $("#name").focus();
        $(document).on('click', '#edit', function () {
            var id = $(this).data('id');
            location.href = "/halls/edit/" + id;
        });

        $(document).on('click', '#delete', function () {
            var id = $(this).data('id');
            confirm_delete(id);
        });

        /*Create custom user*/
        $(document).on('click', '#create_halls', function () {
            location.href = "/halls/create";
        });

        $('#remove-user').click(function () {
            const hall_id = document.getElementById('user-id').value;
            delete_hall(hall_id)
        });
    });

    function confirm_delete(id) {
        $('#confirm-remove-modal').modal('show');
        $(document).on('click', '#confirm_delete', function () {
            delete_hall(id);
        });
    }

    /*{{--//TODO:: MOOM**EN S. ALDA**HDOUH 12/15/2021--}}*/
    function get_halls() {
        table.DataTable({
            /*processing: true,
           serverSide: true,
           pageLength: 10,
           sDom: 'lrtip',
           "order": [[0, "desc"]],*/
            ajax: {
                "url": "halls",
                "type": 'GET',
            },
            columns: [
                {
                    name: 'id',
                }, {
                    data: 'name',
                    name: 'name',
                }, {
                    data: 'title',
                    name: 'title',
                }, {
                    data: 'type',
                    name: 'type',
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "columnDefs": [{
                "render": function (data, type, full, meta) {
                    return meta.row + 1; // adds id to serial no
                },
                "targets": 0
            }],
        });
    }

    function delete_hall(id) {
        $.ajax({
            type: "DELETE",
            url: "/halls/delete/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function (response) {
                if (response['success']) {
                    /*$('#successfully-remove').modal('show');
                    $('#successfully-remove #message').html(response['success']);*/
                    table.DataTable().ajax.reload();
                } else if (response['error']) {
                    $('#something-wrong').modal('show');
                    $('#something-wrong #message').html(response['error']);
                }
            }
        });
    }
});
