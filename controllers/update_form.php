<?php

function handle(){
    require_once('../blog_to_rokumaru_mvc/models/blog.php');

    $blog = new Blog();
    $result = $blog->getById($_GET['id']);

    $result['category'] = (int)$result['category'];
    $result['publish_status'] = (int)$result['publish_status'];

    return $result;
}

?>