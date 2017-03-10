/**
 * Created by Administrator on 2017/3/8.
 */
var divLeftIdArticalesId = $("#divLeftIdArticalesId");
var index_funtion = function (page) {
    var articles = $.ajax({url: "/articles", async: false, data: {page: page, size: 10}});
    var page_total = articles.responseJSON.total_page;
    articles = articles.responseJSON.list;
    var html = '';
    for (var i in articles) {
        if (articles[i].title_img == 0) {
            var html_tpm = '<div class="container" style="width: auto;">' +
                '<div class="jumbotron" style="background-color: #fff">' +
                '<h2 style="margin-top: -20px">' +
                articles[i].title +
                '</h2>' +
                '<p style="font-size: 16px;">' +
                articles[i].content +
                '</p>' +
                '<p style="margin-bottom: -20px;margin-top: 30px;">' +
                '<span class="glyphicon glyphicon-link" aria-hidden="true"></span>' +
                '<a href="/articles/' + articles[i].id + '" class="navbar-link" target="_black">全文</a>' +
                '</p>' +
                '</div>' +
                '</div>';
            html += html_tpm;
        } else {
            // todo
        }

    }
    divLeftIdArticalesId.html(html);

    if (page_total > 1) {
        page_function(page_total, page);
    }
};

var page_function = function (total_page, current_page) {
    var i_html = '';
    for (var i = 1; i <= total_page; i++) {
        if (current_page == i) {
            i_html += '<li class="active"><a href="javascript:;" class="pageClass">' + i + '</a></li>';
        } else {
            i_html += '<li><a href="javascript:;" class="pageClass">' + i + '</a></li>';
        }
    }
    var html =
        '<nav aria-label="Page navigation" style="text-align: center">' +
        '<ul class="pagination">' +
        '<li>' +
        '<a href="javascript:;" aria-label="Previous">' +
        '<span aria-hidden="true">&laquo;</span>' +
        '</a>' +
        '</li>' +
        i_html +
        '<li>' +
        '<a href="javascript:;" aria-label="Next">' +
        '<span aria-hidden="true">&raquo;</span>' +
        '</a>' +
        '</li>' +
        '</ul>' +
        '</nav>';
    $('#divLeftIdPagesId').html(html);
    $('.pageClass').unbind('click').bind('click', function () {
        index_funtion(this.text);
    });
};

index_funtion(1);


