$(document).ready(function () {
    $.ajax({
        url: 'controller.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $('#users tbody').empty();

            $.each(response, function (index, user) {

                var row = '<tr>' +
                    '<td>' + user.name + '</td>' +
                    '<td>' + user.email + '</td>' +
                    '<td>' + user.phone + '</td>' +
                    '<td>' + user.city + '</td>' +
                    '</tr>';

                $('#users tbody').append(row);
            });
        },
        error: function () {
            alert('Error al cargar los usuarios');
        }
    });
});
