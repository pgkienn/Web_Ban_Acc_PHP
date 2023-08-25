<?php
require_once("../middleware/logger.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Kí</title>
    <link rel="stylesheet" href="../assets/css/auth.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header id="header">
        <div class="container">
            <?php
                require_once("../views/layout/header.php")
            ?>
        </div>
    </header>
    <div class="container">
        <div class="row" style="min-height: 75vh; margin: 0 !important; padding:0;">

            <div class="col-10 col-sm-6 col-lg-4 card d-flex" id="card-auth">
                <form 
                    method="POST"
                    id="form-register"
                >   
                    <div class="h1 text-center p-2 text-light" style="margin: 0;">ĐĂNG KÍ</div>
                    <input 
                        class="form-control display-1 mt-2 bg-light" 
                        placeholder="tài khoản *" type="text"  name="username" 
                        id="username"
                    >
                    <input 
                        class="form-control display-1 mt-4 bg-light" 
                        placeholder="mật khẩu *" type="password" name="password" 
                        id="password"
                    >
                    <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                    <input class="form-control display-1 mt-4 bg-light" placeholder="email" type="email" name="email" id="email">

                    <div class="text-center d-grid gap-2">
                        <button type="submit" class="btn border mt-3 text-light ">
                            ĐĂNG KÍ
                        </button>
                    </div>
                </form>
                <a class="test text-light" href="./login.php" style="text-decoration: none;">Bạn đã có tài khoản ?</a>
            </div>
        </div>
    </div>
    <footer class="footer mt-5">
        <?php
            require_once("../views/layout/footer.php")
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>

        const form = getId("form-register");
        const username = getId("username");
        const password = getId("password");
        const email = getId("email");

        function getId(id) {
            return document.getElementById(id);
        };

        form.addEventListener("submit", (e) => {
            e.preventDefault();

            fetch("/handle/handle_register.php", {
                method: "POST",
                body: JSON.stringify({
                    username: username.value,
                    password: password.value,
                    email: email.value 
                }),
                headers: {
                    "Content-Type": "application/json"
                }
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === "success") {
                    window.location.href = "/../";
                }
                if(data.status === "error"){
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        close: true,
                        style: {
                            background: "linear-gradient(to right, #eb3349, #f45c43)",
                        },
                    }).showToast();
                }
            })
        })

        const btn = document.querySelector(".toggle-password");
        const input = document.querySelector("#password");
        btn.addEventListener('click', (c) => {
            if(input.value != "") {
                if(input.type == "password") {
                    input.setAttribute("type", "text");
                    btn.classList.remove("fa-eye-slash");
                    btn.classList.add("fa-eye");
                } else {
                    input.setAttribute("type", "password");
                    btn.classList.remove("fa-eye");
                    btn.classList.add("fa-eye-slash");
                }
            }
        })

        
    </script>
</body>
</html>