<?php
/**
 * 2021ろくまるMVC化((2)参考サイトより) index.php
 */

if($_SERVER['REQUEST_METHOD'] == 'GET'){  //リクエストのパラメータがGET通信のとき
    $params = explode('/', $_GET['url']);

    $model = array_shift($params); // 1番目の要素を取ってくるarray_shift
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){ //リクエストのパラメータがPOST通信のとき(フォームからのリクエスト等)
    if(isset($_POST['id'])) $request['id'] = $_POST['id'];
    if(isset($_POST['title'])) $request['title'] = $_POST['title'];
    if(isset($_POST['content'])) $request['content'] = $_POST['content'];
    if(isset($_POST['category'])) $request['category'] = $_POST['category'];
    if(isset($_POST['publish_status'])) $request['publish_status'] = $_POST['publish_status'];
    
    $params = explode('/', $_SERVER['REQUEST_URI']);  //ページにアクセスするために指定された URI。例えば、 '/index.html'
    
    if($params[0] === '' || $params[1] === 'blog_to_rokumaru_mvc'){
        $model = $params[2]; //3番目の要素(指定したURL)を代入
    }
    
}

// $modelがformでないときかつ$requestがないとき(GETのとき)
if($model !== 'form' && !isset($request)){
    include('./controllers/' . $model . '.php'); //ファイルの読み込み
    $ret = handle(); //関数の呼び出し
    
        if($model === 'blog_list'){ //blog_listのとき、多次元配列なのでforeach
            foreach($ret as $value){
                extract($value); //連想配列のkeyをもとに、変数に展開する 
                
                $result[] = ['id' =>$id, 'title'=>$title, 'content'=>$content, 'category'=>$category, 'post_at'=>$post_at, 'publish_status'=>$publish_status]; 
            }
        } else {
            if(is_array($ret)) extract($ret); //連想配列のkeyをもとに、変数に展開する
        }
}

// $requestがtrue -> POSTリクエストの場合
if(isset($request)){
    include('./controllers/' . $model . '.php'); //ファイルの読み込み
    $ret = handle($request); //関数の呼び出し
    
    //extract($ret); //連想配列のkeyをもとに、変数に展開する
}

//laravelのdd()↓
// var_dump($result);die();

/* $retは$blogData取得($modelがblog_listのとき)
array(2) { 
    [0]=> array(6) { ["id"]=> string(1) "4" ["title"]=> string(24) "オブジェクト指向" ["content"]=> string(24) "クラス使いました" 
                ["category"]=> string(1) "2" ["post_at"]=> string(19) "2022-01-24 11:29:43" ["publish_status"]=> string(1) "1" }
    [1]=> array(6) { ["id"]=> string(1) "5" ["title"]=> string(27) "オブジェクト指向②" ["content"]=> string(9) "テスト" 
                ["category"]=> string(1) "1" ["post_at"]=> string(19) "2022-01-24 13:09:20" ["publish_status"]=> string(1) "1" } 
}
*/


include('./views/' . $model . '.php'); //viewファイルを読み込んで表示


?>