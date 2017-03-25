/**
 * Created by Administrator on 2017/3/8.
 */
var articleId = $("#articleId");
var index_funtion = function () {
    var url = window.location.href;
    var param = url.substr(url.indexOf("articles/") + 9);
    param = parseInt(param);

    console.log(url);
    console.log(param);
    console.log(url.indexOf("articles/"));
    var articles = $.ajax({url: "/article/" + param, async: false, data: {}});

    articles = articles.responseJSON;
    console.log(articles);


    var html = markdown.toHTML(articles['content']);

    console.log(html);
    articleId.html(html);





};
index_funtion();


