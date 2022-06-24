<?php

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
</head>
<body>
    <h2>ブログ詳細</h2>
    <h3>タイトル：<?php echo $title; ?></h3>
    <p>投稿日時：<?php echo $post_at; ?></p>
    <p>カテゴリ：<?php echo $category; ?></p>
    <hr>
    <p>本文：<?php echo $content; ?></p>
    <p><a href="blog_list">戻る</a></p>
</body>
</html>