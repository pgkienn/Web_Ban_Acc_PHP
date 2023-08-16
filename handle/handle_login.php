<?php
require_once("../library/message.php");
session_start();

$db = new mysqli("localhost", "root", "", "web_acc");
$request = file_get_contents("php://input");
$result = json_decode($request);

$username = trim($db->real_escape_string($result->username));
$password = md5(trim($db->real_escape_string($result->password)));


if(!isset($username) || empty($username) || !isset($password) || empty($password)){
    Message::errorClose("Tài Khoản Hoặc Mật Khẩu Không Được Để Trống!", $db);
}

$kq = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

if($kq->num_rows == 0){
    Message::errorClose("Sai Tài Khoản Hoặc Mật Khẩu!", $db);
}

$_SESSION['user'] = $kq->fetch_assoc();
Message::successClose("Đăng Nhập Thành Công", $db);
?>