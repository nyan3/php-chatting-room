<?php
header('Access-Control-Allow-Origin:*');
function upload(){
$pic = $_FILES['myfile']['tmp_name'];
$upload_ret = false;
if($pic){
$uploadDir = '../uploadimg';
if(!file_exists($uploadDir)){
mkdir($uploadDir, 0777);
 }
 $targetFile = $uploadDir . '/' . time() . $_FILES['myfile']['name'];
$upload_ret = move_uploaded_file($pic, $targetFile);
 }
if($upload_ret){
return $targetFile;
 }else{
return "0";
}
}
$fileplace=upload();
if(($data=fopen('public.txt','a'))==FALSE){echo json_encode(("服务器出错，请手动发送图片链接".$fileplace));exit();}
if(!fwrite($data,PHP_EOL.'picture'.'|'.'<a href="'.$fileplace.'" target="_blank">'.'<img src="'.$fileplace.'"/></a>')){echo json_encode(("服务器出错，请手动发送图片链接".$fileplace));exit();}
//echo json_encode($a);
?>