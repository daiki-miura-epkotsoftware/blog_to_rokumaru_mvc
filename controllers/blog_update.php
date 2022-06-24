<?php
function handle($request){
    require_once('../blog_to_rokumaru_mvc/models/blog.php');

    $blogs = $request; //post通信で受け取ったリクエストデータ
    
    $blog = new Blog();
    $blog->blogValidate($blogs);
    $blog->blogUpdate($blogs);

    return $blog;
}
?>