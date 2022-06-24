<?php
// handleメソッド
function handle($request){
    require_once('../blog_to_rokumaru_mvc/models/blog.php');

    $blogs = $request;

    $blog = new Blog();
    $blog->blogValidate($blogs);
    $blog->blogCreate($blogs);

    return $blog;
}

?>