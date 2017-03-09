<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
<div class="blog-post">
    <h2 class="blog-post-title">{{$data['title']}}</h2>

    <p class="blog-post-meta">{{$data['date']}}<a href="#">Mark</a></p>
    {{$data['content']}}

</div>
</body>
</html>