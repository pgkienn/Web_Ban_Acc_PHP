<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        
    </style>
</head>
<body>
    <div class="layout">
        <header id="header">
            <?php
                require_once("layout/header.php");
            ?>
        </header>

        <div class="slide-show p-1">
            <?php
                require_once("layout/sold_account.php")
            ?>
        </div>

        <div class="filter container p-2">
            <?php
                require_once("layout/filter_products.php")
            ?>
        </div>
        
        <div class="content">
            <?php
                require_once("layout/content_card.php")
            ?>
        </div>

        <footer>
            <?php
                require_once("layout/footer.php")
            ?>
        </footer>
        
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>