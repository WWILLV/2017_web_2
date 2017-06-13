<?php
defined('black_hat') or exit('Access Invalid!');
if (!isset($_POST['username']) or !isset($_POST['nickname']) or !isset($_POST['password'])){

}else{
  $sql = "insert into t_user (username,nickname,password)  values('".$_POST['username']."', '".$_POST['nickname']."','".md5($_POST['password'])."')";
  if (mysql_query($sql)){
    header("Location: ./route.php?act=login");
    exit();
  }
}
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>register</title>
        <link rel="stylesheet" href=css/bootstrap.min.css>
        <link rel="stylesheet" href=css/bootstrap-theme.min.css />
        <script src="js/jquery-2.2.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    <style>
            .container{
                max-width: 400px;
                margin: 20px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <h2>register</h2>

        <form method="POST" action="route.php?act=register">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="username" />
            </div>
	     <div class="form-group">
                <label for="nickname">Nickname</label>
                <input class="form-control" type="text" name="nickname" placeholder="nickname" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="password" />
            </div>
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="register" />
        </form>
        </div>
    </body>

