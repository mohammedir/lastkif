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
            delete_hall(id);
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

    /*{{--//TODO:: MOOM**EN S. ALDA**HDOUH 12/15/2021--}}*/
    function get_halls() {
        table.DataTable({
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
                    data: 'gallery',
                    name: 'gallery',
                }, {
                    data: 'title',
                    name: 'title',
                }, {
                    data: 'description',
                    name: 'description',
                }, {
                    data: 'url',
                    name: 'url',
                }, {
                    data: 'type',
                    name: 'type',
                }, {
                    data: 'created_at',
                    name: 'created_at',
                }, {
                    data: 'status',
                    name: 'status',
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
