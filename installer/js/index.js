$(document).ready(function () {
    $("#check_db_btn").click(function () {
        $("#warning_alert").show();

        // Credenziali per l'accesso al database \\
        var db_username = $("#username_field_db").val();
        var db_password = $("#password_field_db").val();
        var db_host = $("#host_field_db").val();
        var db_name = $("#db_name_field_db").val();
        var tbl_prefix = $("#tbl_prefix_field_db").val();

        $.post('php/checkdb.php', { username: db_username, password: db_password, host: db_host, name: db_name, prefix: tbl_prefix }, function (data) {
        }).done(function () {
            $("#warning_alert").hide();
            $("#error_alert").hide();
        }).fail(function (data) {
            $("#warning_alert").hide();
            $("#error_alert").show();
        });
    });
})