<?php include_once('./inc/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-90680653-2');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">
    <title>Login - MS Power Bank</title>
    <link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/azia.css">
  </head>
  <?php
            $uid = @$_POST['email'];
            $pwd = @$_POST['password'];
            $error = "";
            if (isset($_POST['sign_in'])) {
                //Error Handlers
                //Check if inputs are empty
                if (empty($uid) || empty($pwd)) {
                    $error = "
                    <div class='alert alert-danger' role='alert'>
                    Inputs cannot be empty!
</div>";
                } else {
                    $sql = "SELECT * FROM users WHERE email='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck < 1) {
                        $error = "
                        <div class='alert alert-danger' role='alert'>
                        Incorrect Email!
</div>";
                    } else {
                        if ($row = mysqli_fetch_assoc($result)) {
                            $id_login = $row['id'];
                            $username_login = $row['email'];
                            $password_login = $row['password'];
                            //dehashing the password        
                            if ($pwd == $password_login) {
                                $_SESSION['id'] = $id_login;
                                $_SESSION['username'] = $username_login;
                                $_SESSION['password'] = $password_login;
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
                                exit();
                            } else {
                                $error = "
                                <div class='alert alert-danger' role='alert'>
                                Wrong Password!
</div>";
                            }
                        }
                    }
                }
            }
            ?>
  <body class="az-body">
    <div class="az-signin-wrapper">
      <div class="az-card-signin">
        <center><img src='./img/brand-logo.png' style='max-width: 130px;'></center>
        <div class="az-signin-header">
          <h2>Welcome back!</h2>
          <h4>Please sign in to continue</h4>
          <?php
              echo $error;
            ?>  
          <div class="form-group">
              <form action="login.php" method="POST">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="info@yourcompany.com">
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div><!-- form-group -->
            <button type="Submit" name="sign_in" class="btn btn-az-primary btn-block">Sign In</button>
          </form>
        </div><!-- az-signin-header -->
        </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>

    <script src="../js/azia.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>
</html>
