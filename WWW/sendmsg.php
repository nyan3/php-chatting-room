<?php
$message = $_POST["message"];
$uid = $_POST["uid"];
$usr = $_POST["usr"];
$randomcookie = file_get_contents('usr/'.$usr.'/randomcookie');
if($uid!=$randomcookie){
echo "<script>location.href='login.html?loggedin=false'</script>"; 
exit();
}
$message=htmlspecialchars($message,ENT_QUOTES);
$message=str_replace('|','&brvbar;',$message);
if(($data=fopen('public.txt','a'))==FALSE){echo "Nope";exit();}
if(!fwrite($data,PHP_EOL.$usr.'|'.$message)){echo "ERROR";exit();}
echo "OK";
?>