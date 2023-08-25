<?php
session_start();
$id = $_GET['id'];
$name_page = "Chi Tiết Sản Phẩm";
$db = new mysqli('localhost', 'root', '', 'web_acc');

$product = $db->query("SELECT categories.name, products.code, products.lien_ket, products.tuong, products.skin, products.id
    FROM products, categories 
    WHERE products.id = $id AND categories.id = products.category_id AND products.status = 1")->fetch_assoc();

$product_image = $db->query("SELECT products.id as id, categories.name as category, product_images.image as image, products.code as code
FROM products, product_images, categories 
WHERE product_images.product_id = $id AND categories.id = products.category_id AND products.status = 1");

if(empty($product) && !isset($product)) {
    exit("404 not found");
}
$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        .image-product{
            width: 100%;
            border: 5px solid #adad;
        }
    </style>
</head>

<body>
    <div class="layout">
        <header id="header">
            <div class="container">
                <?php
                    require_once("../../layout/header.php");
                ?>
            </div>
        </header>
        <div class="slide-show p-1">
            <?php
                require_once("../../layout/sold_account.php")
            ?>
        </div>

        <div class="content container">
            <div class="content-header">
                <div class="infor-product p-3 row">
                    <?php
                    echo '
                        <div class="text-dark text-left col-6 col-lg-4 fs-6 p-1">Tên Game:'.$product['name'].'</div>
                        <div class="text-dark text-left col-6 col-lg-4 fs-6 p-1" id="'.$product['id'].'" name="idPro">#'.$product['code'].'</div>
                        <div class="text-dark text-left col-6 col-lg-4 fs-6 p-1">Bảo Hành: 24 giờ</div>
                        <div class="text-dark text-left col-6 col-lg-4 fs-6 p-1">Trình Trạng: '.$product['lien_ket'].'</div>
                        <div class="text-dark text-left col-6 col-lg-4 fs-6 p-1">Tướng: '.$product['tuong'].'</div>
                        <div class="text-dark text-left col-6 col-lg-4 fs-6 p-1">Skin: '.$product['skin'].'</div>
                    ';
                    ?>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-shopping-cart fa-lg"></i></button>
                </div>
            </div>
            <div class="conten-body row">
                <?php
                
                foreach($product_image as $item){
                    echo'
                    <div class="col-12 col-sm-6 col-lg-4" style="padding: 3px;">
                        <img class="card-img-top image-product" src="'.$item['image'].'" alt="anh-chi-tiet-san-pham">
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Mua #
                        <?php
                            echo $product['code'];
                        ?>
                    </h5>
                    
                </div>
                <div class="modal-body">
                    <p class="text-danger fs-5">Lưu ý:</p>
                    <p>Nếu lo lắng về tài khoản! bạn hãy quay video kể từ lúc mua tài khoản đến lúc vào check liên kết.</p>
                    <p>Shop không giải quyết nếu không có video.</p>
                    <p>Bảo Hành 24h về tài khoản không giống miêu tả trên shop.</p>
                    <p>Cảm Ơn <i class="fas fa-heart" style="color: #e84d26;"></i></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở Lại</button>
                    <div class="btn btn-danger"  id="btn-mua">Mua Ngay </div>
                </div>
                </div>
            </div>
        </div>
        <footer class="mt-5">
            <?php
                require_once("../../layout/footer.php")
            ?>
        </footer>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script> 
        const mua = document.getElementById("btn-mua")
        const idProduct = document.getElementsByName("idPro");
        
        mua.addEventListener("click", (e) => {
            e.preventDefault();

            fetch("../../../handle/handle_buy.php", {
                method: "POST",
                body: JSON.stringify({
                    id: idProduct[0].id
                }),
                headers: {
                    "Content-Type": "application/json"
                }
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === "error") {
                    Toastify({  
                        text: data.message,
                        duration: 3000,
                        close: true,
                        style: {
                            background: "#f14668",
                        },
                    }).showToast();
                }
                if(data.status === "success") window.location = "./history_accounts.php";
            })
        });
        </script>
</body>
</html>