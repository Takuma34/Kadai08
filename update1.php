<?php

//1. POSTデータ取得
$name = $_POST['name'];
$tell = $_POST['tell'];
$address = $_POST['address'];
$company = $_POST['company'];
$hosp = $_POST['hosp'];
$item = $_POST['item'];
$sn = $_POST['sn'];
$message = $_POST['message'];
$id = $_POST['id'];

// var_dump($id);

//2. DB接続します
try {
    $db_name = 'gs_db'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//３．データ登録SQL作成

$stmt = $pdo->prepare('UPDATE gs_new_table 
                       SET name = :name, 
                       company = :company, 
                       tell = :tell,
                       address = :address,
                       hosp = :hosp,
                       item = :item,
                       sn = :sn,
                       message = :message,
                       date = sysdate()
                       WHERE id = :id');

                       $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                       $stmt->bindValue(':company', $company, PDO::PARAM_STR);
                       $stmt->bindValue(':tell', $tell, PDO::PARAM_STR);
                       $stmt->bindValue(':address', $address, PDO::PARAM_STR);
                       $stmt->bindValue(':hosp', $hosp, PDO::PARAM_STR);
                       $stmt->bindValue(':item', $item, PDO::PARAM_STR);
                       $stmt->bindValue(':sn', $sn, PDO::PARAM_STR);
                       $stmt->bindValue(':message', $message, PDO::PARAM_STR);
                       $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                      $status = $stmt->execute(); //実行

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: select1.php');
    exit();
}

