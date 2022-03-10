<?php
$statusstr = $_POST["status"];
$usrname=$_POST["usrname"];
$status=intval($statusstr);
$content=file_get_contents('public.txt');
//echo($content);
$arr=explode(PHP_EOL, $content);
$num=count($arr);
$data="";
//echo($num);

for($i=$status;$i<$num;$i++){
$whole=$arr[$status];
$buff=explode('|',$whole);
$username=$buff[0];
$msg=$buff[1];
if($msg==""){$status++;continue;}
if($username==$usrname){
$username="you";
$data=$data."<p><div style='width:70%;'></div><font color='green' style='float:right'>:".$username."</font></p>"."<div id=\"mymsg\">".$msg."</div>";
}
else{
$data=$data."<font color='blue'>".$username.":</font>"."<div id=\"item\">".$msg."</div>";
}
$status++;
}
//echo($data);
//echo($data);
echo($status."|".$data);

?>