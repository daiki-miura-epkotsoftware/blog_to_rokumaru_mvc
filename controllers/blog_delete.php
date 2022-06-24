<?php
function handle(){
    require_once('../blog_to_rokumaru_mvc/models/blog.php');

    $blog = new Blog();
    $result = $blog->delete($_GET['id']); //今回はdelete処理はGET通信でidを渡している

    return $result;
}

?>