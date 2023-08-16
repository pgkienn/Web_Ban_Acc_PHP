<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        body {
            width:100%;
            background-image: url("https://nhadepso.com/wp-content/uploads/2023/01/khampha-50-anh-anime-thien-nhien-dep-lang-man-lam-hinh-nen_4.jpg");
        }
    </style>
</head>
<body>
    <div class="container">
        <form  
            method="POST" id="form-login"
            style="width: 40rem; height: 300px; margin: 0 auto; margin-top: 90px;"
        >
            <div class="h2 text-light text-center"> Đăng Nhập </div>

            <label for="" class="form-label text-light h5">Tên Đăng Nhập:</label>
            <input type="text" class="form-control me-5" name="username" id="username">

            <label for="" class="form-label text-light h5 mt-3">Mật Khẩu:</label>
            <input class="form-control" name="password" type="password" id="password">

            <div class="text-center d-grid gap-2">
                <button type="submit" class="btn btn-success mt-3">
                    ĐĂNG NHẬP
                </button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>

        const form = getId("form-login");
        const username = getId("username");
        const password = getId("password");

        function getId(id) {
            return document.getElementById(id);
        };

        form.addEventListener("submit", (e) => {
            e.preventDefault();

            fetch("/handle/handle_login.php", {
                method: "POST",
                body: JSON.stringify({
                    username: username.value,
                    password: password.value
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