<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/auth.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="row" style="width: 100vw; height: 100vh; margin: 0 !important; padding:0;">
        <div class="col-1 col-sm-3 col-lg-4"></div>

        <div class="col-10 col-sm-6 col-lg-4 card mt-5" style="height: 70%;" id="card-auth">
            <form 
                method="POST"
                id="form-register"
            >
                <div class="h1 text-light text-center p-3 mt-3" id="aaa"> Đăng Kí </div>

                <label for="" class="form-label text-light">Tên Đăng Nhập:</label>
                <input type="text" class="form-control me-5 display-1" name="username" id="username">

                <label for="" class="form-label text-light mt-3">Mật Khẩu:</label>
                <input class="form-control display-1" name="password" type="password" id="password">

                <label for="" class="form-label text-light mt-3">Email:</label>
                <input class="form-control display-1" name="email" type="email" id="email">

                <div class="text-center d-grid gap-2">
                    <button type="submit" class="btn btn-register mt-3 text-light">
                        ĐĂNG KÍ
                    </button>
                </div>
            </form>
            <a class="mt-2 text-light text" href="./login.php" style="text-decoration: none;">Bạn đã có tài khoản ?</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
                alert(data.message)
                if(data.status === "success") {
                    window.location.href = "/../";
                }
            })
        })
        

        
    </script>
</body>
</html>