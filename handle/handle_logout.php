<?php
require_once("../library/message.php");
session_start();

if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    echo "Bạn Chưa ĐĂNG NHẬP";
    exit();
}

unset($_SESSION['user']);
header("Location: ../index.php");
?>