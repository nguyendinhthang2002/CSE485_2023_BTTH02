<?php
    $u=$_POST['username'];
    $p=$_POST['password'];

    $db = mysqli_connect("localhost","root","","btth01_cse485");
    $sql = "select * from user where user='$u' and pass='$p'";
    $rs=mysqli_query($db,$sql);

    if(mysqli_num_rows($rs)>0){
        echo"<script language='javascript'>window.location='index.php';</script>";
    } else{echo"<script language='javascript'>alert('Đăng nhập thất bại!'); window.location='login.php'</script>";}

?>