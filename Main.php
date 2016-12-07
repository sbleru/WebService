<?php
session_start();
include_once('Header.php');
include_once('Functions.php');

$errorMessage = "";

// ログイン状態チェック
if (!isset($_SESSION["USERID"])) {
    header("Location: Logout.php");
    exit;
}

// 投稿メッセージ 
if (isset($_SESSION['MESSAGE'])){
    echo "<b>". $_SESSION['MESSAGE']."</b>";
    unset($_SESSION['MESSAGE']);
}

if(isset($_POST['post'])){
    // メッセージの入力チェック
    if(empty($_POST['body'])){
        $errorMessage = 'メッセージが未入力です。';
    }
    if(!empty($_POST['body'])){
        $_SESSION['BODY'] = $_POST['body'];
        header("Location: Add.php");
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>Hello <u><?php echo htmlspecialchars($_SESSION["USERNAME"], ENT_QUOTES, "UTF-8"); ?></u>!</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="Logout.php">ログアウト</a></li>
        </ul>

        <!-- 投稿フォーム -->
        <div><font color="#ff0000"><?php echo $errorMessage ?></font></div>
        <form method='post' action=''>
            <p>Your status:</p>
            <textarea name='body' rows='5' cols='40' wrap=VIRTUAL></textarea>
            <p><input type='submit' id = 'post' name='post' value='submit'/></p>
        </form>

        <p><a href='Users.php'>see list of users</a></p>

<h2>Users you're following</h2>

<?php
$users = show_users($_SESSION['USERID']);

// if (count($users)){
?>
    <!-- <ul> -->
    <?php
    // foreach ($users as $key => $value){
    //     echo "<li>".$value."</li>\n";
    // }
    ?>
    <!-- </ul> -->
<?php
// }else{
?>
    <!-- <p><b>You're not following anyone yet!</b></p> -->
<?php
// }
?>

<?php
// $users = show_users($_SESSION['USERID']);
// if (count($users)){
//     $myusers = array_keys($users);
// }else{
//     $myusers = array();
// }
// $myusers[] = $_SESSION['USERID'];

// $posts = show_posts($myusers,5);
$posts = show_posts($_SESSION['USERID'],5);
?>

<?php
// $posts = show_posts($_SESSION['USERID']);

if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
// 連想配列の分解
foreach ($posts as $key => $list){
    echo "<tr valign='top'>\n";
    echo "<td>".$list['userid'] ."</td>\n";
    echo "<td>".$list['body'] ."<br/>\n";
    echo "<small>".$list['stamp'] ."</small></td>\n";
    echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>You haven't posted anything yet!</b></p>
<?php
}
?>

    </body>
</html>