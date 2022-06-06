<?php
$conn = mysqli_connect("localhost", "root", "", "aptech_php_28");
$action = filter_input(INPUT_POST, 'action');
if ($action != false && $action == 'dk') {
    $taikhoan = filter_input(INPUT_POST, 'user');
    $email = filter_input(INPUT_POST, 'email');
    $matkhau = filter_input(INPUT_POST, 'password');
    $nhaplaimatkhau = filter_input(INPUT_POST, 'repassword');

    if (!empty($taikhoan) && !empty($email) && !empty($matkhau)) {
        if ($matkhau == $nhaplaimatkhau) {
            $query = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES 
('$taikhoan', '$email', '$matkhau')");
            echo "Bạn đã đăng ký tài khoản thành công";
        } else
            echo "Mật khẩu và nhập lại mật khẩu không đúng";
    } 
    else echo "Tên tài khoản hoặc email đã được sử dụng";
}
    else echo "Bạn phải nhập đầy đủ thông tin";


$dangnhap = filter_input(INPUT_POST, 'dangnhap');
if (isset($dangnhap)) {
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Đăng ký</title>
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <form action="" method="post">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Đăng ký</h3>

                                <div class="form-outline mb-4">
                                    <input type="text" name="user" class="form-control form-control-lg" placeholder="Tài khoản" />

                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Mật khẩu" />
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="repassword" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu" />
                                </div>
                                <div class="row">
                                    <div class=" col-md-6">
                                        <input type="hidden" name="action" value="dk">
                                        <input type="submit" name="dk" class="btn btn-primary btn-lg btn-block" style="width: 80%" value="Đăng ký">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="submit" name="dangnhap" value="Đăng nhập" class="btn btn-primary btn-lg btn-block" style="width: 80%">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>