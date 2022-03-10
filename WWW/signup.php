<?php
$signupname=$_POST['set_name'];
$signup_password=$_POST['set_password'];
if($login_name==""){echo "<script>location.href='login.html?loggedin=false'</script>";}
if($login_password==""){echo "<script>location.href='login.html?loggedin=false'</script>";}
chdir("usr");
if(is_dir($signupname)){ 
echo('already have this account');
exit();
}
mkdir($signupname);
chdir($signupname);
touch("passwd");
touch("privatetalk");
if(($data=fopen('passwd','w'))==FALSE){
echo('failed to create your data');
exit();
}
if(!fwrite($data,$signup_password)){
fclose($data);
echo('failed to write to your data');
exit();
}
fclose($data);
echo "<script>location.href='login.html'</script>"; 
?>