<?php

// 1.GETで id値を取得
$id = $_GET["id"];


// // 2.DB接続など
try {
    // Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
}

// // 3．データ取得SQL作成
$sql = "SELECT * FROM gs_new_table WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// // 4．データ表示
$view = "";
if ($status === false) {
    // execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    // データのみ抽出の場合はwhileループで取り出さない
    $row = $stmt->fetch();
}

// var_dump($row);

?>

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="utf-8">
    <title>修理受付フォーム</title>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="css/main.css"/>
    <style>
        .required {
            color: #fff;
            background-color: red;
            padding: 2px 6px;
            font-size: 10px;
            border-radius: 3px;
            float: right;
            margin-left: 5px;
        }

        td {
            padding-right: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h2 class="title">修理受付フォーム（修正）</h2>
        <p style="font-size: 17px;">受付番号：<?=$id?></p>

    </header>

    <form id="main" action="update1.php" method="post">
        <table id="mainTable">
            <h3>1.ご依頼者</h3>
            <tr>
                <td class="yourname">                  
              <span class="required">必須</span>担当者</td>
                <td><input id="textBoxName" type="text" name="name" value="<?=$row["name"]?>"/></td>
            </tr>
            <tr>
                <td class="company">                   
                     <span class="required">必須</span>代理店名</td>
                <td><input id="textBoxCompany" type="text" name="company" value="<?=$row["company"]?>"/></td>
            </tr>
            <tr>
                <td class="tell">                    
                    <span class="required">必須</span>電話番号</td>
                <td><input id="textBoxTell" type="text" name="tell" value="<?=$row["tell"]?>"/></td>
            </tr>
            <tr>
                <td class="address">                    
                    <span class="required">必須</span>住所</td>
                <td><input id="textBoxAddress" type="text" name="address" value="<?=$row["address"]?>"/></td>
            </tr>
        </table><br>

        <table id="subTable">
            <h3>2.修理内容</h3>
            <tr>
                <td class="hosp">                    
                    <span class="required">必須</span>病院</td>
                <td><input id="textBoxhosp" type="text" name="hosp" value="<?=$row["hosp"]?>"/></td>
            </tr>
            <tr>
                <td class="item">                    
                    <span class="required">必須</span>製品名</td>
                <td><input id="textBoxitem" type="text" name="item" value="<?=$row["item"]?>"/></td>
            </tr>
            <tr>
                <td class="sn">シリアル</td>
                <td><input id="textBoxsn" type="text" name="sn" value="<?=$row["sn"]?>"/></td>
            </tr>
            <tr>
                <td class="reson">修理内容</td>
                <td id="message">
                    <textarea id="textarea" name="message"><?=$row["message"]?></textarea>
                </td>
            </tr>
        </table>

        <div id="button">
            <input type="hidden" name="id" value="<?=$row["id"]?>">
            <input type="submit" value="更新" id="save">

            <a href="index1.php" style="text-decoration: none;">
            <input id="remove" type="button" value="戻る"></a>
    
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $('#remove').click(function () {
                $('#main')[0].reset();
            });

            $('#save').click(function (e) {
                var requiredFields = $('.required');
                var isValid = true;

                requiredFields.each(function () {
                    var input = $(this).parent().next().find('input, textarea');
                    if (!input.val()) {
                        isValid = false;
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert("入力漏れがあります。");
                }
            });
        });
    </script>
</body>
</html>
