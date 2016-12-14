<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Main</title>
        <!-- BootstrapのCSS読み込み -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="bootstrap/css/login.css" rel="stylesheet"> -->
        <link href="bootstrap/css/form.css" rel="stylesheet">
        <!-- jQuery読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1 class="text-primary"><b>Home</b></h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <!-- ユーザー名をechoで表示 -->
        <p class="text-primary">Hello <b>{$login_user}</b>! 
        <a href="Logout.php"><u>Logout</u></a>
        </p>
        <!-- 投稿フォーム -->
        <div><font class="text-danger">{$error_message}</font></div>
        <form method='post' action=''>
            <p class="bg-primary">Your status:</p>
            <textarea class="bg-success" name='body' rows='5' cols='40' wrap=VIRTUAL></textarea>
            <button type="submit" id="post" name="post" class="btn btn-primary btn-block btn-large">Submit</button>
        </form>

        <p><a href='Users.php'><u>see list of users</u></a></p>

        <h2 class="bg-primary">Follow comment</h2>

        <!-- 投稿表示 -->
        {if $count_posts}
            <div class="container">
            <div class="table-responsive">
            <table border='1' cellspacing='0' cellpadding='5' width='500' class="table table-bordered bg-success">
                {foreach from=$array_post item=list}
                    <tr valign='top'>
                    <td>{$list.userid}</td>
                    <td>{$list.body}<br/>
                    <small>{$list.stamp}</small></td>
                    </tr>
                {/foreach}
            </table>
            </div>
            </div>
        {else}
            <p class="text-primary"><b>You haven't posted anything yet!</b></p>
        {/if}

    </body>
</html>