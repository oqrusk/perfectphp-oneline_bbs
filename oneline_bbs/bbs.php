<?php

// DB接続

$link = mysql_connect('0.0.0.0', 'root', 'mysql');
if(!link) {
    die('データベースに接続できません：'.mysql_error());
}

// データベースを選択する
mysql_select_db('oneline_bbs', $link);

$errors = array();

//POSTなら保存処理

if( $_SERVER['REQUEST_METHOD'] === 'POST') {
    // 名前の☑
    $name = null;
    if (!isset($_POST['name']) || !strlen($_POST['name'])) {
        $errors['name'] = '名前を入力してください';
    } else if (strlen($_POST['name']) > 40) {
        $errors['name'] = '名前は40文字以内で入力してください';
    } else {
        $name = $_POST['name'];
    }

    //　ひとことの☑
    // 名前の☑
    $comment = null;
    if (!isset($_POST['comment']) || !strlen($_POST['comment'])) {
        $errors['comment'] = 'ひとことを入力してください';
    } else if (strlen($_POST['name']) > 200) {
        $errors['comment'] = 'ひとことは200文字以内で入力してください';
    } else {
        $comment = $_POST['comment'];
    }

    // エラーがなければ保存
    if (count($errors) === 0) {
        //保存SQL作成
        $sql = "INSERT INTO `post` (`name`, `comment`, `created_at`) VALUES ('"
            . mysql_real_escape_string($name) . "', '"
            . mysql_real_escape_string($comment) . "', '"
            . date('Y-m-d H:i:s') . "')";
        //保存
        mysql_query($sql, $link);

        mysql_close($link);

        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
}

//投稿された内容を取得
$sql = "SELECT * FROM `post` ORDER BY `created_at` DESC";
$result = mysql_query($sql, $link);

$posts = array();

if($result !== false && mysql_num_rows($result)){
    while( $post = mysql_fetch_assoc($result)){
        $posts[] = $post;
    }
}

// 取得結果を開放して接続を閉じる
mysql_free_result($result);
mysql_close($link);

include 'views/bbs_view.php';
?>