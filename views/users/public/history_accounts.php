<?php
session_start();
require_once("../../../middleware/not_logger.php");
$name_page = "Trang Cá Nhân";
$db = new mysqli("localhost", "root", "", "web_acc");

$idUser = $_SESSION['user']['id'];

$history_acc = $db->query("SELECT T.id as idGD, T.created_at as timeGD, P.code as maSP, PD.username as taikhoan, PD.password as matkhau FROM transactions T JOIN products P ON T.product_id = P.id JOIN users U ON T.user_id = U.id JOIN product_details PD ON P.id = PD.product_id WHERE U.id = 6 LIMIT 0, 25;");

echo(gettype($history_acc));

$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Mua</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div class="body">
        <header id="header">
            <div class="container">
            <?php
                require_once("../../layout/header.php");
            ?>
            </div>
        </header>
        <div class="content container">
            <div class="row">
                <?php
                
                ?>
            </div>
        </div>
        <footer>
            <?php
                require_once("../../layout/footer.php")
            ?>
        </footer>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </div>
</body>
</html>