<?php
$login_name=$_POST['login_name'];
$login_password=$_POST['login_password'];
if($login_name==""){echo "<script>location.href='login.html?loggedin=false'</script>";}
if($login_password==""){echo "<script>location.href='login.html?loggedin=false'</script>";}
chdir("usr");
if(is_dir($signupname)){ 
echo('do not have this account!');
exit();
}
chdir($login_name);
if(!file_exists('passwd')){
echo('??? your datas were lost');
exit();
}
$password = file_get_contents('passwd');
if($login_password==$password){
$randomcookie=rand(1000000, 9999999);
if(($data=fopen('randomcookie','w'))==FALSE){
echo "setcookie error"; 
exit();
}
fwrite($data,$randomcookie);
setcookie('loginkey',$randomcookie,time()+3600*72);
setcookie('loginname',$login_name,time()+3600*72);
}
else{
echo "<script>location.href='login.html?loggedin=false'</script>"; 
}
echo "<script>location.href='main.html'</script>"; 
exit();
?>