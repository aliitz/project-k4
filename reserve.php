<!DOCTYPE html>
<?php
include('./phpFunction/Function.php');
if (!isset($_SESSION['user'])) {
  header('Location:/Login.php');
}
if (isset($_GET['roomId'])) {
  $room = get_room_1($_GET['roomId']);
  if ($room === 103) {
    header('Location:/error.php');
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../image/five-star-hotel-26-1115112.png" />
  <link rel="stylesheet" href="../css/reserve.css" />
  <title>reserve</title>
</head>

<body>
  <?php
  if(isset($_SESSION['massage'])){
    echo $_SESSION['massage'];
    unset($_SESSION['massage']);
  }
  ?>
  <div class="contianer">
    <div class="info-room">
      <div class="header-info">
        <h2>اطلاعات اتاق رزرو شده</h2>
      </div>
      <div class="type-room">
        <span>نوع اتاق</span>
        <div class="detial-room">
          <span class="most-bad" id="numberPersson"> اتاق <?php echo $room['capacity'] ?> تخته</span>
          <span id="price"><?php echo $room['price'] ?></span>
        </div>
      </div>
      <div class="information">
        <p>
          تاریخ ورود
          <span class="green-color" id="dateReserv">4/8/1401</span>بعد از ساعت
          15 و تاریخ خروج
          <span class="green-color" id="dateExit">5/8/1401</span>قبل از ساعت
          12 و اقامت شما به مدت
          <span class="green-color" id="numberNight">1</span><span class="green-color">شب</span>است
        </p>
      </div>
    </div>
  </div>
  <div class="contianer">
    <div class="booker-information">
      <div class="header-booker">
        <h3>اطلاعات رزرو کننده</h3>
      </div>
      <form method="POST">
        <div class="form-booker-information">
          <label for="1"> نام </label>
          <?php echo'<input type="text" id="1" value="'.$_SESSION['user']['name'].'"/>'?>
          <label for="2">نام خانوادگی </label>
          <?php echo'<input type="text" id="2" value="'.$_SESSION['user']['lastname'].'"/>'?>
          <!-- <label for=""> کد ملی </label>
        <input type="text" /> -->
          <label for="3"> شماره تلفن </label>
          <?php echo'<input type="text" id="3" value="'.$_SESSION['user']['phone'].'"/>'?>
        </div>
        <label for="" class="lbl-role"><input type="checkbox" name="check" />
          <span class="role">قوانین رزرو اینترنتی هتل و قوانین لغو رزرو هتل</span>
          را مطالعه نموده ام و ان را قبول دارم .
        </label>
        <button name="submit" class="btn-reserv" type="submit">رزرو اتاق</button>
      </form>
      <?php
      if(isset($_POST['submit'])){
        if(isset($_POST['check'])){ 
          $var=[
            'datestart'=>$_SESSION['datestart'],
            'userId'=>$_SESSION['user']['userId'],
            'roomId'=>$room['roomId']
          ];
          if(add_reserve($var)===101){
            $_SESSION['massage']="اتاق با موفقیت رزرو شد";
            header('Location:/reserve.php');
          }
        }
        else{
          $_SESSION['massage']="قوانین رزرو باید تایید شود";
          header('Location:/reserve.php');
        }
      }
      
      ?>
    </div>
  </div>

  <script src="../js/reserv.js"></script>
</body>

</html>