<nav class="navbar navbar-expand-lg" style="margin: 0;">
    <div class="col">
        <a class="navbar-brand text-light ms-2 text-lg text-md text-s" href="#">Trang Chủ</a> 
    </div>
    <div class="col-5 col-sm-3 d-flex align-items-end flex-column me-1">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" style="margin-left: 50px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <?php
            if(isset($_SESSION['user'])){
                echo '
                    <div class="nav-item p-2">
                        <a class="btn btn-light rounded-pill" href=""><b>Hey:</b>'.$_SESSION['user']['username'].'</a>
                    </div>
                    <div class="nav-item p-2">
                        <a class="btn btn-danger text-light w-100 rounded-pill" href="../handle/handle_logout.php">Đăng Xuất</a>
                    </div>
                    ';
            }else{
                echo '
                    <div class="nav-item p-2">
                        <a class="btn btn-info text-light rounded-pill" href="./auth/login.php">Đăng Nhập</a>
                    </div>
                    <div class="nav-item p-2">
                        <a class="btn border text-light w-100 rounded-pill" href="./auth/register.php" id="btn-register">Đăng Kí</a>
                    </div>';
            }
            ?>
        </div>
    </div>
</nav>
