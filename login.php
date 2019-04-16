<?php include"include/theme-function.php"; include"include/database.php"; include"include/functions.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?php get_url(); ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php get_url(); ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php get_url(); ?>plugins/iCheck/square/blue.css">
    <link rel="stylesheet" type="text/css" href="<?php get_url(); ?>dist/fonts/fontiran.css">
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html">ورود به سامانه</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">نام کاربری و رمز ورود</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="u_username" class="form-control" placeholder="نام کاربری">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="u_password" class="form-control" placeholder="رمز ورود">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> ذخیره رمز
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button name="login" type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
            </div>
          </div>
        </form>

        <?php
          if(isset($_POST['login'])){
            $username = $_POST['u_username'];
            $password = $_POST['u_password'];
            $st = check_login($username, $password);
            echo $st;
            if($st==1){
              $user_id = get_user_id($username);
              $uid = $user_id[0][0];
              header("location: index.php?login=ok&id=" . $uid);
            }else{ ?>
              <br><div class="alert alert-danger">نام کاربری یا رمز وارد شده صحیح نمی باشد</div>
            <?php
            }
          } ?>


        <a href="#">فراموشی رمز</a><br>

      </div>
    </div>

    <script src="<?php get_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="<?php get_url(); ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php get_url(); ?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>