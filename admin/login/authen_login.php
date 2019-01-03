<?php 
include('../../koneksi.php'); 
session_start();
if(isset($_POST['user_name']) and isset($_POST['user_pass'])){
    $username=$_POST['user_name'];
    $password=$_POST['user_pass'];

    $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    $count = mysqli_num_rows($query);
    if($count == 1){
        $_SESSION['login']=$username;
        header("Location: ../index.php");
    }
    else{
        header("Location: login.php");
    }
}
else{
    echo "Username dan Password tidak cocok";
}

?>