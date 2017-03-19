/**
 * Created by Administrator on 2017/3/19.
 */
$("#signId").click(function(){
    var articles = $.ajax({
            type: "POST",
            url: "/login/users",
            async: false,
            data:{
                email: $("#inputEmail").val(),
                password: $("#inputPassword").val(),
                remember: $("#rememberId").val(),
                _token: $("#csrfTokenId").val()
            }});


});