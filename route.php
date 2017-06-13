<?php
define("black_hat", 'icq');
include("common.php");
$_POST=d_addslashes($_POST);
$_GET=d_addslashes($_GET);
$file = $_GET['act'].".php";
if (!is_file($file)){
    die("not hats");
}
include_once($file);
?>
