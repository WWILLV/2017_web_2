<?php
defined('black_hat') or header('Location: route.php?act=login');
session_start();
include_once "common.php";
$connect=mysql_connect("127.0.0.1","root","haozigege") or die("there is no ctf!");
mysql_select_db("hats") or die("there is no hats!");
if (isset($_POST["name"])){
  $name = str_replace("'", "", trim(waf($_POST["name"])));
  if (strlen($name) > 11){
    echo("<script>alert('name too long')</script>");
  }else{
    $sql = "select count(*) from t_info where username = '$name' or nickname = '$name'";
    echo $sql;
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    if ($row[0]){
      $_SESSION['hat'] = 'black';
      echo 'good job';
    }else{
	$_SESSION['hat'] = 'green';
    }
    header("Location: index.php");
  }
  
}

?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>show me your hat</title>
        <link rel="stylesheet" href=css/bootstrap.min.css />
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
        <h2>your hat</h2>

        <form method="POST" action="route.php?act=login">
            <div class="form-group">
                <label for="name">your name</label>
                <input class="form-control" type="name" id="name" name="name" placeholder="name" />
            </div>
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="check" />
        </form>
	<a href='route.php?act=register'>I want to register</a>
        </div>
    </body>
</html>
