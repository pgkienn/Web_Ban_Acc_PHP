<nav class="navbar navbar-expand-lg justify-content-between p-3" style="margin: 0;">
    <div class="col-5 col-sm-4 col-lg-4">
        <a class="navbar-brand text-light ms-2 text-lg text-md text-s" href="/">
            <img src="/assets/img/logoshop.png" alt="" style="width: auto; height: 70px; cursor: pointer;">
        </a> 
    </div>
    <div class="d-flex align-items-center me-1">
        <?php
        if(isset($_SESSION['user'])){
            echo '
                <div class="nav-item p-2">
                    <a class="btn text-light fs-6" href="#" id="btn-card">Nạp Tiền</a>
                </div>
                <div class="dropdown">
                    <a 
                    href="#" 
                    class="btn btn-dark text-ligt fs-6 d-flex align-items-center justify-content-center link-dark text-decoration-none dropdown-toggle" 
                    id="dropdownUser3" id="box-shadow" data-bs-toggle="dropdown" aria-expanded="false"
                    >
                        <i class="fas fa-user-circle text-light">'.$_SESSION['user']['username'].'</i> 
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3" style="left: -67px;">
                        <li><span class="dropdown-item">Bạn có '.number_format($_SESSION['user']['vnd'], 0,".",",").'đ</span></li>
                        <li id="li"><a class="dropdown-item item-li" href="/views/users/public/history_accounts.php">Tài Khoản Đã Mua</a></li>
                        <li id="li"><a class="dropdown-item item-li" href="#">Lịch Sử Nạp Thẻ</a></li>
                        <li><a class="dropdown-item btn-logout" href="/handle/handle_logout.php">Đăng Xuất</a></li>
                    </ul>
                </div>
                ';
        }else{
            echo '
                <div class="nav-item p-2">
                    <a class="btn border text-light " href="/auth/login.php" id="btn-login"><i class="fas fa-sign-in-alt"></i> <span>Đăng Nhập</span></a>
                </div>
                <div class="nav-item p-2">
                    <a class="btn text-light w-100 " href="/auth/register.php" id="btn-register"><i class="fas fa-user-plus"></i> <span>Đăng Kí</span></a>
                </div>';
        }
        ?>
    </div>
</nav>
