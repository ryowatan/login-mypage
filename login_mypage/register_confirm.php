<?php
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得(サーバーへ仮アップロードされたディレクトリ(フォルダ)とファイル名)
//仮保存→名前も仮で画像を保存　
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得。事前に画像を格納する「image」という名前のフォルダを作成しておく必要あり
/*考え方として、登録される画像ファイルを全部保存すると重くなるので、画像のファイル名とパスを記憶しておき、
DBで照合して、合致した場合にimageフォルダに保存した画像ファイルを呼び出している*/

$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/' . $original_pic_name;

//仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる
move_uploaded_file($temp_pic_name, './image/' . $original_pic_name);

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <title>マイページ登録</title>
    　　　
    <link rel="stylesheet" type="text/css" href="register_confirm.css">
    　　　
</head>
<body>
    <!-- このbodyの中に、マイページとして表示する部分を記述していく（HTMLとPOSTで記述）-->
    <header>
        <img src="4eachblog_logo.jpg">
               
    </header>

    <main>
        <div class="all_contents">
            <div class="form_contents">
                <h2>会員登録確認</h2>
                <h3>こちらの内容で登録しても宜しいでしょうか？</h3>
                <div class="nakami">
                    <p>名前: <?php echo $_POST['name']; ?></p>
                </div>
                <div class="nakami">
                    <p>メール:<?php echo $_POST['mail']; ?></p>
                </div>
                <div class="nakami">
                    <p>パスワード: <?php echo $_POST['password']; ?></p>
                </div>
                <div class="nakami">
                    <!--他の変数はpostで行うが、ファイルだけは$_FILESで表示する
                    ここでは、ファイル名だけで良いので、['picture']['name']と表記-->
                    <p>プロフィール写真:<?php echo $_FILES['picture']['name']; ?></p>
                </div>
                <div class="nakami">
                    <p>コメント:<?php echo $_POST['comments']; ?></p>

                </div>

            </div>
            <!--ボタンクラスを作り、その中に戻ると登録を入れてmargin 0 auto すると中央そろいになる-->
            <div class="button">
                 <form action="register.php" method="POST">
                    <input type="submit" class="modoru_button" value="戻って修正する">
                  </form>

                    <!--コピペ時の”と"に注意 気づきずらい
                    さらに、echo使用時はファイルだけ$_filesにして使う（あと、enctypeも忘れずに！！)-->

                    <!--戻るボタンと登録ボタンはそれぞれformタグを使うと二段になるので、1つのformにまとめる
                    さらに、sizeを調整して中央そろえになるように配置する-->

                 <form action="register_insert.php" method="post" enctype="multipart/form-data">
                    <input type="submit" class="touroku_button" size="15" value="登録する" />
                    <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                    <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                    <!--変更あり-->
                    <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                    <input type="hidden" value="<?php echo $path_filename; ?>" name="path_filename">
                    <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">       
                </form>
            </div>
        </div>
        
        <footer>
            © 2018 InterNous.inc. All rights reserved
        </footer>
    </main>
</body>

</html>
<!--http://localhost/register/login_mypage/register_confirm.php-->