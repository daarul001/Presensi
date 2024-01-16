<?php
session_start();
include 'config/db.php';
$oke = mysqli_query($con, "SELECT * FROM tb_sekolah WHERE id_sekolah=1 ");
$oke1 = mysqli_fetch_array($oke);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>LMS</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.o">
  <!--===============================================================================================-->
  <link rel="shortcut icon" type="image/png" href="./vendor/images/favicon.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./vendor/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="./vendor/login/css/main.css">
  <link rel="stylesheet" href="./vendor/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./vendor/node_modules/simple-line-icons/css/simple-line-icons.css">
  <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./vendor/css/style.css">
  <link rel="stylesheet" href="./vendor/css/footer.css">
  <link rel="stylesheet" href="./vendor/css/responsive.css">
  <link rel="stylesheet" href="./vendor/css/animate.css">
  <!-- endinject -->
  <link href="sweetalert.css" rel="stylesheet" />
  <!-- <link href="./vendor/sweetalert2/sweetalert2.css" rel="stylesheet" /> -->
</head>

<body>
  <div class="limiter">
    <div class="container-login100" style="background: linear-gradient(to top, #ffffff, #005CAA);">
      <div class="wrap-login100 p-l-30 p-r-30 p-t-30 p-b-30">
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong style=" font-family:'Courier New', Courier, monospace;">Reminder</strong><br>
          <ul style="font-family:'Courier New', Courier, monospace;">Untuk Siswa.... <br>
            Gunakan NIS untuk Username Login</ul>
        </div>

        <!-- <div class="box">
  <span></span>
</div> -->


        <center><img src="./vendor/images/favicon.png" alt="" height="100" width="100"></center>
        <form method="post" action="" class="login100-form validate-form">
          <span class="login100-form-title text-white">
            LMS LOGIN
          </span>
          <hr style="border-bottom:3px dashed #d9d2d2;">

          <div class="wrap-input100 validate-input m-b-15" data-validate="Username is required">
            <span for="nis" class="label-input100">Username</span>
            <input class="input100 text-white" type="text" name="username" placeholder="Type your username" autocomplete="off">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-15" data-validate="Password is required">
            <span for="Password" class="label-input100">Password</span>
            <input class="input100 text-white" type="password" name="password" placeholder="Type your password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>

          <div class="wrap-input0 validate-input" data-validate="Password is required">
            <span class="label-input100">User</span>
            <select name="level" class="form-control" required style="background: rgba(0, 0, 0, 0.5); color: #fff;font-weight: bold; border-radius: 15px; border: 2px dashed #adadad;">
              <option value="">-- Pilih Level --</option>
              <option value="1"> Guru </option>
              <option value="2"> Siswa </option>
              <option value="3"> Admin </option>
            </select>
          </div>
          <br>
          <div class="text-right p-b-22">
            <a class="btn-sm btn-danger" style="border-radius: 20px;" href="https://wa.me/6283827989505?text=Reset%20Password%0A%0ANIS%3A%0ANAMA%3A%0AKELAS%3A">
              <i class="fa fa-key">&nbsp; Forgot password?</i></a>
          </div>

          <div class="container-login100-form-btn m-b-15">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button value="LOGIN" name="Login" type="submit" class="login100-form-btn">
                Login
              </button>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button value="daftar_elearning" type="submit" class="login100-form-btn" onclick="window.location.href='./Home/Registrasion.php'">
                Daftar Akun Siswa?
              </button>
            </div>
          </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $email = trim(mysqli_real_escape_string($con, $_POST['username']));
          $pass = sha1($_POST['password']);
          $level = $_POST['level'];
          if ($level == '1') {
            $sql = mysqli_query($con, "SELECT * FROM tb_guru WHERE email='$email' AND password='$pass' AND status='Y' ") or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql);
            $id = $data[0];
            $cek = mysqli_num_rows($sql);
            if ($cek > 0) {
              $_SESSION['Guru'] = $id;
              $_SESSION['upload_gambar'] = TRUE;
              echo "
              <script type='text/javascript'>
              setTimeout(function () {
              swal({
              title: 'Sukses',
              text:  'Login Berhasil..',
              icon: 'success',
              timer: 3000,
              showConfirmButton: true
              });     
              },10);  
              window.setTimeout(function(){ 
              window.location.replace('Guru/index.php');
              } ,3000);   
              </script>";
            } else {
              echo "
              <script type='text/javascript'>
              setTimeout(function(){
              swal({
              title: 'Error',
              text:  'User ID / Password Salah Atau Belum Dikonfirmasi Oleh Admin !',
              icon: 'error',
              timer: 3000,
              showConfirmButton: true
              });     
              },10);  
              window.setTimeout(function(){ 
              window.location.replace('login');
              },3000);   
              </script>";
            }
          } elseif ($level == '2') {
            $sql = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nis='$email' AND password='$pass' AND aktif='Y' ") or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql);
            $id = $data[0];
            $cek = mysqli_num_rows($sql);
            if ($cek > 0) {
              $_SESSION['Siswa'] = $id;
              $_SESSION['username']     = $data['nis'];
              $_SESSION['namalengkap']  = $data['nama_siswa'];
              $_SESSION['password']     = $data['password'];
              $_SESSION['nis']          = $data['nis'];
              $_SESSION['id_siswa']     = $data['id_siswa'];
              $_SESSION['kelas']        = $data['id_kelas'];
              $_SESSION['jurusan']      = $data['id_jurusan'];
              $_SESSION['tingkat']     = $data['tingkat'];
              mysqli_query($con, "UPDATE tb_siswa SET status='Online' WHERE id_siswa='$data[id_siswa]'");
              echo "
            <script type='text/javascript'>
            setTimeout(function(){
            swal({
            title: 'Login Berhasil...',
            text: 'Selamat Datang" . ' ' . $data['nama_siswa'] . "',
            icon: 'success',
            timer: 3000,
            showConfirmButton: true
            });     
            },10);  
            window.setTimeout(function(){ 
            window.location.replace('Siswa/index.php');
            },3000);   
            </script>";
            } else {
              echo "
            <script type='text/javascript'>
            setTimeout(function(){
            swal({
            title: 'MAAF !',
            text:  'User ID / Password Salah Atau Belum Dikonfirmasi Oleh Admin !',
            icon: 'error',
            timer: 3000,
            showConfirmButton: true
            });     
            },10);  
            window.setTimeout(function(){ 
            window.location.replace('login');
            },3000);   
            </script>";
            }
          } elseif ($level == '3') {
            $sql = mysqli_query($con, "SELECT * FROM tb_admin WHERE username='$email' AND password='$pass' AND aktif='Y' ") or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql);
            $id = $data[0];
            $cek = mysqli_num_rows($sql);
            if ($cek > 0) {
              $_SESSION['Admin'] = $id;
              $_SESSION['upload_gambar'] = TRUE;
              echo "
          <script type='text/javascript'>
          setTimeout(function(){
          swal({
          title: 'Login Berhasil',
          text:  'Selamat Datang Admin',
          icon: 'success',
          timer: 3000,
          showConfirmButton: true
          });     
          },10);  
          window.setTimeout(function(){ 
          window.location.replace('Admin/index.php');
          },3000);   
          </script>";
            } else {
              echo "
      <script type='text/javascript'>
      setTimeout(function(){
      swal({
      title: 'Gagal',
      text:  'User ID / Password Salah Atau Belum Dikonfirmasi Oleh Admin !',
      icon: 'error',
      timer: 3000,
      showConfirmButton: true
      });     
      },10);  
      window.setTimeout(function(){ 
      window.location.replace('login');
      },3000);   
      </script>";
            }
          }
        }
        ?>
      </div>
      <br>
      <img src="./vendor/images/cloud.png" style="margin-bottom:auto; position:inline;" alt="">
    </div>
  </div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--===============================================================================================-->
  <script src="./vendor/login/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="./vendor/login/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="./vendor/login/vendor/bootstrap/js/popper.js"></script>
  <script src="./vendor/login/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="./vendor/login/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="./vendor/login/vendor/daterangepicker/moment.min.js"></script>
  <script src="./vendor/login/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="./vendor/login/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="./vendor/login/js/main.js"></script>
  <script src="./vendor/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="./vendor/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="./vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="sweetalert.min.js"></script>
  <script src="sweetalert.js"></script>
  <!-- <script src="./vendor/sweetalert2/sweetalert2.js"></script> -->
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../vendor/js/off-canvas.js"></script>
  <script src="./vendor/js/misc.js"></script>

</body>

</html>