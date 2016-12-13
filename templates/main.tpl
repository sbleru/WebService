<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>Hello <u>{$login_user}</u>!</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="Logout.php">ログアウト</a></li>
        </ul>

        <!-- 投稿フォーム -->
        <div><font color="#ff0000">{$error_message}</font></div>
        <form method='post' action=''>
            <p>Your status:</p>
            <textarea name='body' rows='5' cols='40' wrap=VIRTUAL></textarea>
            <p><input type='submit' id = 'post' name='post' value='submit'/></p>
        </form>

        <p><a href='Users.php'>see list of users</a></p>

        <h2>Users you're following</h2>

        <!-- 投稿表示 -->
        {if $count_posts}
            <table border='1' cellspacing='0' cellpadding='5' width='500'>
                {foreach from=$array_post item=list}
                    <tr valign='top'>
                    <td>{$list.userid}</td>
                    <td>{$list.body}<br/>
                    <small>{$list.stamp}</small></td>
                    </tr>
                {/foreach}
            </table>
        {else}
            <p><b>You haven't posted anything yet!</b></p>
        {/if}

    </body>
</html>