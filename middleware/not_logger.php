<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    exit ('vui lòng đăng nhập để tiếp tục');
}
?>