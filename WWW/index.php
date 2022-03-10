<?php
if(isset($_COOKIE['loginname'])){
    if(file_exists('usr/'.$_COOKIE['loginname'])){
        echo "<script>location.href='main.html'</script>";  
    }
    else{
        echo "<script>location.href='login.html'</script>";
    }
}
else{
    echo "<script>location.href='login.html'</script>"; 
}
?>