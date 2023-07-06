<?php

// funcs.phpを読み込む
require_once('funcs1.php');

//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_new_table");
$status = $stmt->execute();

?>


<!-- //３．データ表示 -->
<div class="container">
<?php
$view="";
if ($status === false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
$view .= '<table>';
$view .= '<tr>';
$view .= '<th>受付番号</th>';
$view .= '<th>担当者</th>';
$view .= '<th>代理店</th>';
$view .= '<th>電話番号</th>';
$view .= '<th>住所</th>';
$view .= '<th>病院</th>';
$view .= '<th>製品</th>';
$view .= '<th>シリアル番号</th>';
$view .= '<th>内容</th>';
$view .= '<th>修正</th>';
$view .= '<th>削除</th>';
$view .= '</tr>';

while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<tr>';
    $view .= '<td>' . h($result['id']) . '</td>';
    $view .= '<td>' . h($result['name']) . '</td>';
    $view .= '<td>' . h($result['company']) . '</td>';
    $view .= '<td>' . h($result['tell']) . '</td>';
    $view .= '<td>' . h($result['address']) . '</td>';
    $view .= '<td>' . h($result['hosp']) . '</td>';
    $view .= '<td>' . h($result['item']) . '</td>';
    $view .= '<td>' . h($result['sn']) . '</td>';
    $view .= '<td>' . h($result['message']) . '</td>';
    $view .= '<td><a href="detail1.php?id=' . $result['id'] . '">修正</a></td>';
    $view .= '<td><a href="delete1.php?id=' . $result['id'] . '">削除</a></td>';
    $view .= '</tr>';
}

$view .= '</table>';
}
?>
</div>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>登録一覧</title>
<link rel="stylesheet" href="css/view.css">
<style>
div{padding: 10px;font-size:16px;
}

#show{overflow: auto; height: 400px;

}
</style>
</head>

<body id="main">
<!-- Head[Start] -->
<header>

      <h2 class="list">登録済み一覧</h2>

</header>
<!-- Head[End] -->

<div>
    <div id="show" ><?php echo $view; ?></div>
</div>

<div class="next">
    <a href="index1.php">戻る</a>
</div>

</body>
</html>