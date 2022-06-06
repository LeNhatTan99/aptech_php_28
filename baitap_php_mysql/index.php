
<?php
$conn = mysqli_connect ('localhost', 'root', '', 'aptech_php_28') or die ('Không thể kết nối tới database');

session_start();
if (isset($_SESSION['taikhoan'])){
unset($_SESSION['taikhoan']);
}

$dn = filter_input(INPUT_POST,'dn');
$dk = filter_input(INPUT_POST,'dk');

if(isset($dn) && $dn != false){
$taikhoan = filter_input(INPUT_POST,'tk');
$matkhau = filter_input(INPUT_POST,'mk');

if(!$taikhoan || !$matkhau)
{
echo "Bạn phải nhập đầy đủ thông tin";
}

$query = "SELECT username, password FROM users WHERE username='$taikhoan'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if ($matkhau != $row['password'] || $taikhoan != $row['username']){
    echo "Tên tài khoản hoặc mật khẩu không đúng";
} else echo "Xin chào " .$taikhoan. " Bạn đã đăng nhập thành công!";

}

if(isset($dk)){
    header("location:register.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Đăng nhập</title>
</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
<form action="" method="post">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Đăng nhập</h3>

            <div class="form-outline mb-4">
              <input  type="text" name="tk" require value="<?php echo filter_input(INPUT_POST,'tk') ;?>"  class="form-control form-control-lg" placeholder="Tài khoản"/>
              
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="mk" require value="<?php echo filter_input(INPUT_POST,'mk') ;?>"  class="form-control form-control-lg" placeholder="Mật khẩu"/>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3">   Remember password </label>
            </div>

            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Đăng nhập" name="dn" style="width: 80%">

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Quên mật khẩu?</a></p>

            <hr class="my-4">

            <p>Bạn chưa có tài khoản?  <input type="submit" value="Đăng ký" name="dk" class="btn" style="color:blue">

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


