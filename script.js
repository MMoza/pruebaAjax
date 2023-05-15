$(document).ready(function() {
    $.ajax({
        url: "randomUserApi.php",
        dataType: "json",
        success: function(data) {
            var users = data.results;
            var table = $("#users tbody");
            $.each(users, function(index, user) {
                var name = user.name.first + " " + user.name.last;
                var email = user.email;
                var phone = user.phone;
                var city = user.location.city;
                var row = $("<tr><td>" + name + "</td><td>" + email + "</td><td>" + phone + "</td><td>" + city + "</td></tr>");
                table.append(row);
            });
        }
    });
});
