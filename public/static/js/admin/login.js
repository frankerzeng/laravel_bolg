/**
 * Created by Administrator on 2017/3/19.
 */
$("#signId").click(function () {
    var login = $.ajax({
        type: "POST",
        url: "/login/users",
        async: false,
        data: {
            email: $("#inputEmail").val(),
            password: $("#inputPassword").val(),
            remember: $("#rememberId").val(),
            _token: $("#csrfTokenId").val()
        }
    });

    console.log('------');
    console.log(login);

    var responseJson = login.responseJSON;
    console.log(responseJson);

    if (responseJson.code == 0) {
        window.location.href = "/login/after_login";
    } else {
        var html = '<div class="alert alert-warning">' +
            '<a href="#" class="close" data-dismiss="alert">&times;</a>' +
            '<strong>警告！</strong>' +
            responseJson.msg +
            '</div>';
        $("#alertId").html(html);
    }
});