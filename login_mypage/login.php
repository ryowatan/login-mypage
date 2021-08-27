<!--tableにauto incresementをいれてないために、テーブルを作り直す必要がある
id primary key auto_increcementを入れる-->
<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location:mypage.php");
}
?>


<!DOCTYPE HTML>
<html lang="ja">
   

<head>
            
    <meta charset="UTF-8">
            <title>マイページ登録</title>
           
    <link rel="stylesheet" type="text/css" href="login.css">
       
</head>

<body>
    <header>
                <img src="4eachblog_logo.jpg">
                <div class="login"><a href="login.php">ログイン</a></div>
            </header>

        <main>
                <form action="mypage.php" method="post">
                        <div class="form_contents">
                             
                　　　　　<div class="mail">
                    　　　　　　<label>メールアドレス</label><br>
                              　　  <input type="text" class="formbox" size="40" name="mail" value="<?php if (isset($_COOKIE['login_keep'])) {
                                                                                                        echo $_COOKIE['mail'];
                                                                                                    } ?>" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    　　</div>
                　 　<div class="password">
                                   　<label>パスワード（半角英数字6文字以上）</label><br>
                    <!--valueの値に何か入れておくとformに入力したと判定される。空白も入れない-->
                                  　 <input type="password" class="formbox" size="40" name="password" value="<?php if (isset($_COOKIE['login_keep'])) {
                                                                                                                echo $_COOKIE['password'];
                                                                                                            } ?>" pattern="^[a-zA-Z0-9]{6,}$" required>
                    　　
                </div>
                　　<div class="hozi">
                    <label>
                        <!--<input type="checkbox" name="cb2" checked>とinputタグの最後にcheckedといれるとチェックがつく
                ので、どの部分にphpを差し込んでいる。（クッキーを使う）-->
                        <input type="checkbox" class="hozi" size="40" name="login_keep" value="login_keep" <?php
                                                                                                            if (isset($_COOKIE['login_keep'])) {
                                                                                                                echo "checked='checked'";
                                                                                                            }
                                                                                                            ?>>ログイン状態を保持する
                    </label>
                </div>
                         　 　<div class="toroku">
                    　<input type="submit" class="submit_button" size="35" value="ログイン">
                    　 　</div>
                　　　　</div>
            　　　</form>
        　</main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>
</html>


<!--http://localhost/register/login_mypage/login.php-->