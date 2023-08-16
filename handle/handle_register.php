<?php
require_once("../library/message.php");
session_start();
$db = new mysqli("localhost", "root", "", "web_acc");

$request = file_get_contents("php://input");
$result = json_decode($request);

$username = trim($db->real_escape_string($result->username));
$password = trim($db->real_escape_string($result->password));
$email = trim($db->real_escape_string($result->email));

if(!isset($username) || empty($username) || !isset($password) || empty($password)){
    Message::errorClose("Username Hoặc Password Không Được Để Trống!", $db);
    
}

if(strlen($username) <5 || strlen($username) >20){
    Message::errorClose('username từ 5 đến 20 kí tự', $db);
}

if(strlen($password) <5 || strlen($password) >500){
    Message::errorClose('Password từ 5 đến 500 kí tự', $db);
}

if($username == $password){
    Message::errorClose('username và password không được trùng nhau!!!', $db);
}

$resultDb = $db->query("SELECT * FROM users WHERE username = '$username'");

if($resultDb->num_rows > 0){
    Message::errorClose("Tài Khoản Đã Tồn Tại!", $db);
}

$password = md5($password);
$kq = $db->query("INSERT INTO users(username, password, email) VALUES('$username', '$password', '$email')");

if(!$kq){
    Message::errorClose("Đã Xảy Ra Lỗi, Vui Lòng Thử Lại!", $db);
}
$inforUser = $db->query("SELECT * FROM users WHERE username = '$username'");
$_SESSION['user'] = $inforUser->fetch_assoc();

Message::successClose("Đăng Kí Thành Công", $db);
