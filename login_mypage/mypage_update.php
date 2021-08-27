<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//DB接続・try catch文
//ハイパーリンクにはlocalhast（サーバー側）の方を使う　cフォルダではない
try{
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $e){
die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
<a href='http://localhost/register/login_mypage/login.php'>ログイン画面へ</a>"
   );
}

//preparedステートメント(update)でSQLをセット $  //bindValueメソッドでパラメータをセット
//where入れることで、idが合致したもののみ抜き出す、加えて、idには変化はなく、上書きしているだけ
//カンマが抜けていた
$stmt = $pdo->prepare("update login_mypage set name = ?, mail = ?, password = ?, comments = ? where id = ?");
$stmt->bindValue(1,$_POST["name"]);
$stmt->bindValue(2,$_POST["mail"]);
$stmt->bindValue(3,$_POST["password"]);
$stmt->bindValue(4,$_POST["comments"]);
$stmt->bindValue(5,$_SESSION["id"]);

//executeでクエリを実行
$stmt->execute();


//preparedステートメント(更新された情報をDBからselect文で取得)でSQLをセット $  //bindValueメソッドでパラメータをセット
//なぜmailとpasswordだけ？　マイページでは全部の情報表示しているのに
//$stmt = $pdo->prepare("select *from login_mypage where name=? && mail=? && password=? && comments=? && id=?");
$stmt = $pdo->prepare("select * from login_mypage where mail=? && password=? ");

$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);


//executeでクエリを実行
$stmt->execute();

//データベースを切断

//fetch・while文でデータ取得し、sessionに代入
while ($row = $stmt->fetch()) { 
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
    
}
$pdo = NULL;
//mypage.phpへリダイレクト
    header("location:http://localhost/register/login_mypage/mypage.php");
