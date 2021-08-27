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
        <link rel="stylesheet" type="text/css" href="mypage.css">
</head>
<body> 　　　　　　
         <!-- このbodyの中に、マイページとして表示する部分を記述していく（HTMLと代入したsessionを記述）-->
        　　　　　　　 <header>
                        <img src="4eachblog_logo.jpg">
                        <div class="login"><a href="login.php">ログイン</a></div>
                    </header>

            <main>
                <div class="box">
                        <form action="mypage.php" method="post">
                                            <div class="form_contents">
                                        <p>メールアドレスまたはパスワードが間違っています。</p>    
                                        　　　　　<div class="mail">
                                                　　　　　　<label>メールアドレス</label><br>
                                                          　　  <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                                　　</div>
                                        　 　<div class="password">
                                                               　<label>パスワード（半角英数字6文字以上）</label><br>
                                                              　 <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                                                　　</div>
                                                 　 　<div class="toroku">
                                                　<input type="submit" class="submit_button1" size="35" value="ログイン">
                                                　 　</div>
                                </div>
                </div>
        </main>
        <footer>
                © 2018 InterNous.inc. All rights reserved
        </footer>
</body>
</html>
<!--http://localhost/register/login_mypage/mypage.php-->