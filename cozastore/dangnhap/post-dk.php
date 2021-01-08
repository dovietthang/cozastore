<?php  

require_once '../db.php';
//1. Lấy data từ form gửi sang
$username = trim($_POST['username']);
$full_name = trim($_POST['full_name']);
$phanquyen = $_POST['phanquyen'];
$email = trim($_POST['email']);
$avatar = $_FILES['avatar']; 
$password = trim($_POST['password']);
$sdt_nd = trim($_POST['sdt_nd']);
$anh_nd = "";

//validate
//1.name



//upload ảnh
if($avatar['size'] > 0) {  //kiểm tra kích cỡ ảnh
    $filename = uniqid() . "-" . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], 'uploads/' . $filename);
    $anh_nd = 'uploads/' . $filename;
}
// câu jquery
$sql = "insert into nguoi_dung
            (username , full_name , phanquyen , email, avatar, password, sdt_nd)
        values 
            ('$username', '$full_name','$phanquyen', '$email', '$anh_nd', '$password', '$sdt_nd')";

executeQuery($sql);
// var_dump($sql);die;
header('location:login.php');

?>