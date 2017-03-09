/**
 * Created by Administrator on 2017/3/8.
 */
$(function () {
    $("#headerDivId").load('/static/html/common/header.html', function () {
        hearder_function();
    });
});
var hearder_function = function () {
    var menus = $.ajax({url: "/index/get_menu", async: false});
    menus = menus.responseJSON;

    var html = '';

    for (var i in menus) {
        var menu = menus[i];
        html += '<p class="navbar-text" style="' + menu.css + '"><a href="' + menu.link + '" class="navbar-link">' + menu.title + '</a></p>';
    }

    $("#titleId").html(html);
};
