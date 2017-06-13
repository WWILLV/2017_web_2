<?php
error_reporting(2);
session_start();
$connect = mysql_connect("127.0.0.1", "root", "haozigege") or die("error 1");
mysql_select_db("hats") or die("error 2");
function d_addslashes($array){
        foreach($array as $key=>$value){
        if(!is_array($value)){
            !get_magic_quotes_gpc() && $value=addslashes($value);
            waf($value);
            $array[$key]=$value;
        }   
    }   
    return $array;
}
function waf($value){
    $Filt = "\bUNION.+SELECT\b|SELECT.+?FROM";
    if (preg_match("/".$Filt."/is",$value)==1){
        die("found a hacker");
    }
    $value = str_replace(" ","",$value);  
    return $value;
}
function is_login(){
    $sid = $_COOKIE["sid"];
    $data = explode("|",$sid);
    if($data[0] && $data[1] && $data[1] == encode($data[0]))
    {
        return $data[0];
    }

    return FALSE;
}
function encode($str){
    $key = sha1("Fuck_you_man");
    return md5($key.$str);
}
function set_login($name){
    $data = encode($name);
    setcookie("sid","$name|$data");
}



?>
