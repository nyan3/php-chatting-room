<?php
$usr=$_POST['set_name'];
$uid=$_POST['set_password'];
$todo=$_POST['todo'];
$msg=$_POST['msg'];
$randomcookie = file_get_contents('usr/'.$usr.'/randomcookie');
if($uid!=$randomcookie){
echo "<script>location.href='login.html?loggedin=false'</script>"; 
exit();
}
if($todo=="chpsswd"){
chdir('usr/'.$usr);
if ($msg==""){echo("密码为空");exit();}
    if(($data=fopen('passwd','w'))==FALSE){
    echo('failed to change your passwd');
    exit();
    }
    if(!fwrite($data,$msg)){
    fclose($data);
    echo('failed to change your passwd');
    exit();
    }
    fclose($data);
    echo('修改密码成功');
}

else if($todo=="chname"){
    chdir('usr/');
    if(is_dir($msg))
{
    echo "此用户已存在";
}
else
{
    rename($usr,$msg);
    echo "<script>location.href='login.html'</script>"; 
}

}
else if($todo=="advice"){
    if(($data=fopen('advice','a'))==FALSE){
        //echo('消息发送失败');
        exit();
        }
        if(!fwrite($data,$msg)){
        fclose($data);
        //echo('消息发送失败');
        exit();
        }
        fclose($data);
        echo('感谢你的建议!');
}
?>