<?php
include 'flag.php';
session_start();
defined('black_hat') or header("Location: route.php?act=index");
if(isset($_SESSION['hat'])){
    if($_SESSION['hat']=='green'){
	output("<img src='https://herschelian.files.wordpress.com/2012/06/green-hat-1.jpg'>",10);
    }else{
	output("<img src='http://seocockstars.com/wp-content/uploads/2010/06/black-fedora.jpg'>",1);
	echo $flag;
    }
echo "<br><br><br><a href='logout.php'>I give up!</a>";
}else{
    output("<img src='https://www.computerhope.com/jargon/w/white-hat.jpg'>",10);
echo "<br><br><br><a href='login.php'>I want to check the color of my hat!</a>";
}
function output($content,$count){
    for($i=0;$i<$count;$i++){
	echo $content;
    }
}

