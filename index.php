<?php
// データベース接続情報
$host = "localhost";
$username = "root";
$password = "root";
$database = "test1";

// データベースに接続
$connection = new mysqli($host, $username, $password, $database);

// フォームが送信された場合
$loginMessage = ""; // ログインメッセージの初期化
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力値の取得
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 入力値の検証
    $query = "SELECT id FROM test1 WHERE user = '$username' AND password = '$password'";
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        // ログイン成功
        header("Location:home.php");
    } else {
        // ログイン失敗
        $test_message = "ログインID・パスワードが正しくありません。";
        echo "<script type='text/javascript'>alert('" . $test_message . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
 <div class="main"> 
    <form method="POST" action="">
    <div class="id">ログインID</div>
    <input type="text"  name="username" required></input>
    <div class="password">パスワード</div>
    <input type="password"  name="password" required></input>
    <input type ="submit" value="ログイン" name="button"></input>
    
    </form>
  </div>
</body>
</html>

