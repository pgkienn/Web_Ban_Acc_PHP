<?php
//->fetch_assoc(): 1 data
// nhiều data-> foreach
session_start();

$db = new mysqli("localhost", "root", "", "web_acc");
$products = $db->query("SELECT * FROM products WHERE status = 1");

if(isset($_SESSION['user'])) {
    //print_r($_SESSION['user']);
}
$db->close();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <div class="layout">
        <header id="header">
            <div class="container"><?php
                require_once("views/layout/header.php");
            ?></div>
        </header>

        <div class="slide-show p-1">
            <?php
                require_once("views/layout/sold_account.php")
            ?>
        </div>

        <div class="filter container p-2">
            <?php
                require_once("views/layout/filter_products.php")
            ?>
        </div>
        
        <div class="content">
            <?php
                require_once("views/layout/content_card.php")
            ?>
        </div>

        <footer>
            <?php
                require_once("views/layout/footer.php")
            ?>
        </footer>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>