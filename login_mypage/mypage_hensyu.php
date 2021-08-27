<?php
mb_internal_encoding("utf8");

//mypage.phpで乱数を設定して、マイページ→編集画面以外のパスを封じている(直接URLを入力する等)
if (empty($_POST['from_mypage'])) {
    header("Location:login_error.php");
}
//セッションスタート
session_start();

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    　　　<title>マイページ登録</title>　　
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>
<body>　　　　　
    <!-- このbodyの中に、マイページとして表示する部分を記述していく
　　　　　　（HTMLとsessionを記述。編集できるように、sessionはvalueに入れる。） -->
    　　 <header>
                <img src="4eachblog_logo.jpg">
                <div class="login"><a href="log_out.php">ログアウト</a></div>
        </header>
    <main>
        <div class="box">
            <h2>会員情報</h2>
            <div class="hello">
                <?php echo "こんにちわ！" . $_SESSION['name'] . "さん"; ?>
            </div>
            <!--divタグはボックス要素-->
            <div class="set">
                <div class="float">
                    <img src="<?php echo $_SESSION['picture']; ?>">

                    <div class="basic_info">
                        <form action="mypage_update.php" method="POST">
                            <p>氏名: <input type="text" value="<?php echo $_SESSION['name']; ?>" name="name"></p>
                            <p>メール：<input type="text" value="<?php echo $_SESSION['mail']; ?>" name="mail"></p>
                            <p>パスワード：<input type="text" value="<?php echo $_SESSION['password']; ?> " name="password"></p>

                    </div>

                </div>
            </div>
            <div class="comments">
                <!--データを送り出す時に、name属性をつけないと識別できないよ データを送り出す方と受けと売る方の両方をチェック-->
                <textarea rows="5" cols="75" name="comments"><?php echo $_SESSION['comments']; ?></textarea>
            </div>
            <div class="yohaku">
                <div class="hennshuu">

                    <input type="submit" class="submit" size="35" value="編集する">

                </div>
            </div>
            </form>
        </div>
    </main>
    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>
</html>
<!--http://localhost/register/login_mypage/mypage_hensyu.php-->