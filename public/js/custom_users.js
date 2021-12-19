/*start Project Setting and edit*/
/*{{--//TODO:: MOOM*EN S. ALDAHDOU*H 12/15/2021--}}*/
$(function () {
    const table = $('#custom-users-table');
    const user_type = $('#user_type').val();
    let removed = false;
    $(document).ready(function () {
        get_users();
        $("#name").focus();

        $(document).on('click', '#view', function () {
            var id = $(this).data('id');
            location.href = "/users/view/" + id;
        });

        $(document).on('click', '#edit', function () {
            var id = $(this).data('id');
            location.href = "/customusers/edit/" + id;
        });

        $(document).on('click', '#delete', function () {
            var id = $(this).data('id');
            delete_user(id);
        });

        /*Create custom user*/
        $(document).on('click', '#create_agents', function () {
            location.href = "/customusers/create/agents";
        });
        $(document).on('click', '#create_partners', function () {
            location.href = "/customusers/create/partners";
        });
        $(document).on('click', '#create_managers', function () {
            location.href = "/customusers/create/managers";
        });
        $(document).on('click', '#create_providers', function () {
            location.href = "/customusers/create/providers";
        });

        $('#remove-user').click(function () {
            const user_id = document.getElementById('user-id').value;
            delete_user(user_id)
        });
    })

    /*{{--//TODO:: MOOM**EN S. ALDA**HDOUH 12/15/2021--}}*/
    function get_users() {
        var url = "/customusers/agents/0";
        switch (user_type) {
            case "0":
                console.log(url);
                url = "/customusers/agents/" + user_type;
                break;
            case "1":
                url = "/customusers/partners/" + user_type;
                break;
            case "2":
                url = "/customusers/managers/" + user_type;
                break;
            case "3":
                url = "/customusers/providers/" + user_type;
                break;

        }
        table.DataTable({
            ajax: {
                "url": url,
                "type": 'GET',

            },
            columns: [
                {
                    name: 'id',
                }, {
                    data: 'banner',
                    name: 'banner',
                }, {
                    data: 'name',
                    name: 'name',
                }, {
                    data: 'email',
                    name: 'email',
                }, {
                    data: 'phone',
                    name: 'phone',
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

    function delete_user(id) {
        $.ajax({
            type: "DELETE",
            url: "/customusers/delete/" + id,
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
