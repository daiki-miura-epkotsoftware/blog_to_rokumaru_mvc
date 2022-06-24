<?php
function handle(){
    require_once('../blog_to_rokumaru_mvc/models/blog.php');

    $blog = new Blog();
    $result = $blog->getById($_GET['id']);
    $result['category'] = $blog->setCategoryName($result['category']);

    return $result;
}