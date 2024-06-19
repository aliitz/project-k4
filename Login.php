<!DOCTYPE html>
<?php include('./phpFunction/Function.php'); ?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../image/five-star-hotel-26-1115112.png" />
  <link rel="stylesheet" href="../css/login.css" />
  <title>Login</title>
</head>

<body dir="rtl">
  <div class="contianer">
    <div class="login">
      <div class="formLogin">
        <h2 class="loginheader">ورود به حساب</h2>
        <form method="post">
          <div class="formlabel">
            <label for="َUserName">نام کاربری </label>
            <input name="userName" id="َUserName" type="text" required />
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="icon" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2008 7.9998C15.2008 9.90936 14.4422 11.7407 13.092 13.091C11.7417 14.4412 9.91034 15.1998 8.00078 15.1998C6.09122 15.1998 4.25987 14.4412 2.90961 13.091C1.55935 11.7407 0.800781 9.90936 0.800781 7.9998C0.800781 6.09025 1.55935 4.2589 2.90961 2.90864C4.25987 1.55837 6.09122 0.799805 8.00078 0.799805C9.91034 0.799805 11.7417 1.55837 13.092 2.90864C14.4422 4.2589 15.2008 6.09025 15.2008 7.9998ZM9.80078 5.2998C9.80078 5.77719 9.61114 6.23503 9.27357 6.5726C8.93601 6.91016 8.47817 7.0998 8.00078 7.0998C7.52339 7.0998 7.06555 6.91016 6.72799 6.5726C6.39042 6.23503 6.20078 5.77719 6.20078 5.2998C6.20078 4.82241 6.39042 4.36458 6.72799 4.02701C7.06555 3.68945 7.52339 3.4998 8.00078 3.4998C8.47817 3.4998 8.93601 3.68945 9.27357 4.02701C9.61114 4.36458 9.80078 4.82241 9.80078 5.2998ZM8.00078 8.8998C7.13912 8.89963 6.29553 9.14684 5.57026 9.61207C4.84498 10.0773 4.26852 10.741 3.90938 11.5242C4.41579 12.1133 5.04363 12.586 5.74983 12.9097C6.45604 13.2335 7.22391 13.4007 8.00078 13.3998C8.77766 13.4007 9.54553 13.2335 10.2517 12.9097C10.9579 12.586 11.5858 12.1133 12.0922 11.5242C11.733 10.741 11.1566 10.0773 10.4313 9.61207C9.70603 9.14684 8.86244 8.89963 8.00078 8.8998Z" fill="#64748B" />
            </svg>
          </div>
          <div class="formlabel">
            <label for="Password">رمز عبور </label>
            <input name="password" id="Password" type="password" required />
            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" class="icon" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.49922 7.0998V5.2998C2.49922 4.10633 2.97332 2.96174 3.81724 2.11782C4.66115 1.27391 5.80574 0.799805 6.99922 0.799805C8.19269 0.799805 9.33729 1.27391 10.1812 2.11782C11.0251 2.96174 11.4992 4.10633 11.4992 5.2998V7.0998C11.9766 7.0998 12.4344 7.28945 12.772 7.62701C13.1096 7.96458 13.2992 8.42241 13.2992 8.8998V13.3998C13.2992 13.8772 13.1096 14.335 12.772 14.6726C12.4344 15.0102 11.9766 15.1998 11.4992 15.1998H2.49922C2.02183 15.1998 1.56399 15.0102 1.22643 14.6726C0.888861 14.335 0.699219 13.8772 0.699219 13.3998V8.8998C0.699219 8.42241 0.888861 7.96458 1.22643 7.62701C1.56399 7.28945 2.02183 7.0998 2.49922 7.0998ZM9.69922 5.2998V7.0998H4.29922V5.2998C4.29922 4.58372 4.58368 3.89696 5.09003 3.39062C5.59638 2.88427 6.28313 2.5998 6.99922 2.5998C7.7153 2.5998 8.40206 2.88427 8.90841 3.39062C9.41476 3.89696 9.69922 4.58372 9.69922 5.2998Z" fill="#64748B" />
            </svg>
          </div>
          <a class="forgetpass" href="#">رمز عبور خود را فراموش کرده اید؟</a>
          <button type="submit" name="submit" class="btnlogin">ورود</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $login = login($_POST['userName'], $_POST['password']);
          if ($login == 102) {
            $user=getdata($_POST['userName']);
            $_SESSION['user']=$user;
            header("Location:/");
          } elseif ($login == 103) {
            header("Location:./LoginAction.php");
          } else {
            header("Location:./error.php");
          }
        }
        ?>
        <div class="register">
          <p>حساب کاربری ندارید؟</p>
          <a href="signUp.php">ثبت نام</a>
        </div>
      </div>
      <div class="loginPicture">
        <img class="Picture" src="../image/Hotel Booking-amico.png" alt="login" />
      </div>
    </div>
  </div>
</body>

</html>