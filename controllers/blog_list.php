<?php
function handle(){
    require_once('../blog_to_rokumaru_mvc/models/blog.php');

    //エラー内容の表示
    // ini_set('display_errors', "On");

    $blog = new Blog();

    $blogData = $blog->getAll();

    // 変数の中身を表示 + 処理を止める 
    // var_dump($blogData);
    // die();
    //

    foreach ($blogData as $key => $data){
        $blogData[$key]['category'] = $blog->setCategoryName($data['category']);
    }

    return $blogData;
}

//htmlspecialcharsの関数を定義
function h($s){
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

?>