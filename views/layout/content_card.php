<div class="container">
    <div class="row mb-4 mt-4" style="margin: 0;">
        <?php
            foreach($products as $product){
                $price = number_format($product['price'], 0, ",", ".");
                echo'
                <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="cart rounded p-2" style="background-color: #f1ebeb; padding: 0;">
                        <img src='.$product["avt"].' class="card-img-top" alt="anh_dai_dien" id="card-img">
                        <div class="card-body mt-1">
                            <p class="card-text text-center text-danger fs-4" id="'.$product['id'].'" name="idPro">'.$price.'VNĐ</p>
                            <div class="row">
                                <p id="card-text" class="card-text col-6 col-sm-6 col-md-6 col-lg-6">Tướng: '.$product['tuong'].'</p>
                                <p id="card-text" class="card-text col-6 col-sm-6 col-md-6 col-lg-6">Skin: '.$product['skin'].'</p>
                                <p id="card-text" class="card-text col-12">Rank: '.$product['rank'].'</p>
                            </div>
                            <div class="row justify-content-between" style="margin: 0;">
                                <a 
                                    href="./views/users/public/detail_products.php?id='.$product['id'].'" 
                                    class="btn text-light col-12 me-1 col-lg-12 mb-1 btn-lg btn-block"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    id='.$product["id"].'
                                    style="background-color: hsl(348, 100%, 61%);"
                                > Mua </a>
                                <a  
                                    id='.$product["id"].'
                                    href="./views/users/public/detail_products.php?id='.$product['id'].'" 
                                    class="btn btn-detail col-12 col-lg-12 mb-1 btn-lg btn-block"
                                > Chi Tiết </a>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        ?>
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
</div>
<script> 
    const mua = document.getElementById("btn-mua")
    const idProduct = document.getElementsByName("idPro");
    //console.log(idProduct);
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
            if(data.status === "success") {
                Toastify({  
                    text: data.message,
                    duration: 3000,
                    close: true,
                    style: {
                        background: "#4CAF50",
                    },
                }).showToast();
                window.location.href = "./views/users/public/history_accounts.php";
            }
            
        })
    });
</script>