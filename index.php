<?php

session_start();

if (isset($_SESSION['username'])) {
  header('Location: ./portal.php');
}

include 'header.php';

$error = false;
if (isset($_GET['error'])) {
  $error = true;
}
$logout = false;
if (isset($_GET['logout'])) {
  $logout = true;
}
$success = false;
if (isset($_GET['success'])) {
  $success = true;
}
$no_mail = false;
if (isset($_GET['no-mail'])) {
  $no_mail = true;
}
$fail = false;
if (isset($_GET['fail'])) {
  $fail = true;
}
?>

<div class="bg-green container vw-100 vh-100">
  <div class="vh-100 row align-items-center">
    <div class="col-12 col-md-6">
      <?php
      if ($success) {
        echo <<<EOT
        <div class="alert alert-success" role="alert">
        Please check your mail inbox and spam folder
        </div>
        EOT;
      }
      if ($no_mail) {
        echo <<<EOT
        <div class="alert alert-danger" role="alert">
        Please enter valid e-mail address
        </div>
        EOT;
      }

      if ($fail) {
        echo <<<EOT
        <div class="alert alert-warning" role="alert">
        There is no account with this e-mail address
        </div>
        EOT;
      }
      if ($error) {
        echo <<<EOT
        <div class="alert alert-danger" role="alert">
        Please check your username or password!
        </div>
        EOT;
      }
      if ($logout) {
        echo <<<EOT
        <div class="alert alert-warning" role="alert">
        You have successfully logged out
        </div>
        EOT;
      }
      ?>
      <form action="login_controller.php" method="POST">
        <div class="mb-3">
          <label for="loginText" class="form-label">Username</label>
          <input name="username" type="text" class="form-control <?php if ($error) echo 'is-invalid'; ?>" id="loginText" aria-describedby="loginText">
        </div>
        <div class="mb-3">
          <label for="passwordText" class="form-label">Password</label>
          <input name="password" type="password" class="form-control <?php if ($error) echo 'is-invalid'; ?>" id="passwordText">
        </div>
        <div class="d-flex align-middle justify-content-between">
          <button type="submit" class="btn btn-success">Login</button>
          <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="reset-password-check">
            <label class="form-check-label" for="reset-password-check">
              Reset Password
            </label>
          </div>
        </div>
      </form>
      <form id="reset-password" class="d-none mt-5" action="reset_password.php" method="POST">
        <div class="mb-3">
          <label for="resetEmail" class="form-label">Email</label>
          <input name="resetEmail" type="email" class="form-control" aria-describedby="resetEmail">
        </div>
        <button id="send-reset-mail" type="submit" class="btn btn-warning">Send Reset Mail</button>
      </form>
    </div>
    <div class="col-6 d-md-block d-none">
      <img class="img-fluid" src="./assets/img/login.svg" />
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>