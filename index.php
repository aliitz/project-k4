<!DOCTYPE html>
<?php
include('./phpFunction/Function.php');
$month=[
    'فروردین'=>1,
    'اردیبهشت'=>2,
    'خرداد'=>3,
    'تیر'=>4,
    'مرداد'=>5,
    'شهرویور'=>6,
    'مهر'=>7,
    'آبان'=>8,
    'آذر'=>9,
    'دی'=>10,
    'بهمن'=>11,
    'اسفند'=>12
]
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="icon" type="image/x-icon" href="../image/five-star-hotel-26-1115112.png" />
    <!-- <link href="http://fonts.cdnfonts.com/css/iranian-sans" rel="stylesheet" /> -->
    <link rel="stylesheet" href="../css/index.css " />
    <title>index</title>
</head>

<body>
    <!-- nabar -->
    <div class="container nav-container">
        <div id="nav" class="navbar">
            <a href="#"><img class="logo" src="../image/logo.png" alt="LOGO" /></a>
            <div class="information">
                <a id="set-hotel" href="#hotels"> هتل ها و مجموعه ها </a>
                <a id="services" href="#Possibilities/hotel">امکانات</a>
                <a id="about" href="#rules/hotel">قوانین</a>
                <a id="call" href="#contact/us"> ارتباط با ما</a>
            </div>
            <div class="login-search">
                <div class="login-icon">
                    <?php
                    if (!isset($_SESSION['user'])) { ?>
                        <a href="./Login.php">
                            <span class="login"> ورود / ثبت نام </span>
                        </a>
                    <?php } else {
                    ?>
                        <a href="./Logout.php">
                            <span class="login">خروج</span>
                        </a>
                    <?php
                    }
                    ?>
                    <img src="../svg/profile.svg" alt="Profile" />
                </div>
                <!-- <img src="../svg/search.svg" alt="Search" /> -->
            </div>
            <a href="#reserve">
                <button class="btn-reserv">رزرو اتاق</button>
            </a>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="slider">
                <img id="image-slider" src="../image/hotel-bell_1203-2898.webp" alt="" />
            </div>
        </div>
    </div>
    <div class="container" id="reserve">
        <form method="POST">
            <div class="search-exist">
                <div class="exist">
                    <label for="1">قیمت :
                        <input class="selectbox" id="1" type="text" name="price" required />
                    </label>
                    <label for="">
                        از تاریخ :
                        <div>
                            <select class="selectbox" id="day" name="day" required>
                                <option selected disabled="disabled">روز</option>
                            </select>
                            <select class="selectbox" id="month" name="month" required>
                                <option value="" selected disabled="disabled">ماه</option>
                            </select>
                            <select class="selectbox" id="year" name="year" required>
                                <option value="" selected disabled="disabled">سال</option>
                                <option>1401</option>
                                <option>1402</option>
                            </select>
                        </div>
                    </label>
                    <label for="">
                        به مدت :
                        <select class="selectbox" id="night" name="time" required>
                            <option value="1">1 شب</option>
                            <option value="2">2 شب</option>
                            <option value="3">3 شب</option>
                            <option value="4">4 شب</option>
                        </select>
                    </label>
                    <button name="submit" type="submit" onclick="btnExistClickHandler()" class="btn-reserv btn-exist">
                        برسی موجود بودن
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="room-exist">
            <?php
            if (isset($_POST['submit'])) {
                // echo"erdsfd";
                $date=$_POST['year'].'-'.$month[$_POST['month']].'-'.$_POST['day'];
                $_SESSION['datestart']=$date;
                // var_dump($_SESSION['datestart']);
                $rooms = get_room(5000);
                // var_dump($rooms);
                foreach ($rooms as $room) {
            ?>
                    <div class="exist room">
                        <p class="room-detail">اتاق <?php echo $room['floor'] ?> نفره طبقه <?php echo $room['capacity'] ?></p>
                        <?php if ($room['verify_food']) { ?>
                            <p class="room-detail">صبحانه دارد</p>
                        <?php } else { ?>
                            <p class="room-detail">صبحانه ندارد</p>
                        <?php } ?>
                        <p class="room-detail">قیمت <?php echo $room['price'] ?></p>
                        <?php echo '<a href="./reserve.php?roomId=' . $room['roomId'] . '" class="btn-reserv btn-exist btn-room-reserv">'; ?>
                        رزرو اتاق
                        </a>
                    </div>
            <?php }
            } ?>
            <!-- <div class="exist room">
                <p class="room-detail">اتاق دونفره طبقه 2</p>
                <p class="room-detail">صبحانه دارد</p>
                <p class="room-detail">قیمت 3800000</p>
                <button class="btn-reserv btn-exist btn-room-reserv">
                    رزرو اتاق
                </button>
            </div> -->
        </div>
    </div>

    <div class="container" id="hotels">
        <div class="carts-hotel">
            <div class="cart">
                <div class="image-container">
                    <img class="cart-image" src="../image/hotelA.jpg" alt="" />
                </div>
                <h4 class="title-cart">لورم ایپیسون</h4>
                <p class="description-cart">
                    هتل اسپیناس پالاس با ارائه‌ی مجموعه ای از خدمات رفاهی و تفریحی
                    متنوع، از بهترین هتل های تهران است. اقامت در این هتل همیشه باعث به
                    جاماندن خاطرات فراموش نشدنی برای مهمانان خارجی و ایرانی آن بوده است.
                    ما از اینکه در این هتل پذیرای مهمانان گرامی باشیم مفتخر خواهیم بود.
                    اسپیناس پالاس با احترام به کسانی که این هتل را برای اقامت انتخاب می
                    کنند.
                </p>
            </div>
            <div class="cart">
                <div class="image-container">
                    <img class="cart-image" src="../image/hotelA.jpg" alt="" />
                </div>
                <h4 class="title-cart">لورم ایپیسون</h4>
                <p class="description-cart">
                    هتل اسپیناس پالاس با ارائه‌ی مجموعه ای از خدمات رفاهی و تفریحی
                    متنوع، از بهترین هتل های تهران است. اقامت در این هتل همیشه باعث به
                    جاماندن خاطرات فراموش نشدنی برای مهمانان خارجی و ایرانی آن بوده است.
                    ما از اینکه در این هتل پذیرای مهمانان گرامی باشیم مفتخر خواهیم بود.
                    اسپیناس پالاس با احترام به کسانی که این هتل را برای اقامت انتخاب می
                    کنند.
                </p>
            </div>
            <div class="cart">
                <div class="image-container">
                    <img class="cart-image" src="../image/hotelA.jpg" alt="" />
                </div>
                <h4 class="title-cart">لورم ایپیسون</h4>
                <p class="description-cart">
                    هتل اسپیناس پالاس با ارائه‌ی مجموعه ای از خدمات رفاهی و تفریحی
                    متنوع، از بهترین هتل های تهران است. اقامت در این هتل همیشه باعث به
                    جاماندن خاطرات فراموش نشدنی برای مهمانان خارجی و ایرانی آن بوده است.
                    ما از اینکه در این هتل پذیرای مهمانان گرامی باشیم مفتخر خواهیم بود.
                    اسپیناس پالاس با احترام به کسانی که این هتل را برای اقامت انتخاب می
                    کنند.
                </p>
            </div>
        </div>
    </div>

    <div class="container" id="Possibilities/hotel">
        <div class="Possibilities">
            <h3 style="margin: 1rem">امکانات هتل</h3>
            <div>
                <h4 style="margin: 1rem">امکانات برگزیده</h4>
                <div class="Possibilities-Chosen">
                    <div class="chosen">
                        <span class="material-symbols-outlined tik"> done </span>
                        <span>استخر سرپوشیده</span>
                    </div>
                    <div class="chosen">
                        <span class="material-symbols-outlined tik"> done </span>
                        <span>پارکینگ رایگان</span>
                    </div>
                    <div class="chosen">
                        <span class="material-symbols-outlined tik"> done </span>
                        <span>صندوق امانات</span>
                    </div>
                    <div class="chosen">
                        <span class="material-symbols-outlined tik"> done </span>
                        <span>پذیرش 24 ساعته</span>
                    </div>
                </div>
            </div>
            <div class="possibilities-general">
                <div class="possibilities-internet">
                    <h4>اینترنت</h4>
                    <div class="possibilities-general-item">
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>اینترنت رایگان در اتاق</span>
                        </div>
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>اینترنت رایگان در لابی</span>
                        </div>
                        <span></span>
                    </div>
                </div>
                <div class="possibilities-cleaning">
                    <h4>خدمات نظافت</h4>
                    <div class="possibilities-general-item">
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>اتو</span>
                        </div>
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>خشکشویی</span>
                        </div>
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>نظافت هر روز اتاق</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>غذا و نوشیدنی</h4>
                    <div class="possibilities-general-item">
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>کافه</span>
                        </div>
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>میوه</span>
                        </div>
                        <div class="chosen">
                            <span class="material-symbols-outlined tik"> done </span>
                            <span>صبحانه در اتاق</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="rules/hotel">
        <div class="rules">
            <h3 style="margin: 1rem">قوانین و مقررات هتل</h3>
            <div class="time-delivery time-delivery-1">
                <div class="chosen">
                    <span class="material-symbols-outlined"> schedule </span>
                    <span>ساعت تحویل اتاق</span>
                </div>
                <span>15:00</span>
            </div>
            <div class="time-delivery">
                <div class="chosen">
                    <span class="material-symbols-outlined"> schedule </span>
                    <span>ساعت تخلیه اتاق</span>
                </div>
                <span>12:00</span>
            </div>
            <div class="rules-child">
                <div class="rules-child-header">
                    <span class="material-symbols-outlined"> info </span>
                    <h4>قوانین تخت اضافه و بچه</h4>
                </div>
                <ul class="rules-child-items">
                    <li>هزینه اقامت کودکان زیر پنج سال رایگان است.</li>
                    <li>هزینه اقامت برای کودکان بالای پنج سال کامل محاسب می‌شود.</li>
                    <li>سرویس اضافه به‌صورت کاناپه تخت‌شو ارائه می‌شود.</li>
                </ul>
            </div>
            <div class="rules-reserve">
                <div class="rules-reserve-header">
                    <span class="material-symbols-outlined"> info </span>
                    <h4>قوانین رزرو و استرداد</h4>
                </div>
                <ul class="rules-reserve-items">
                    <li>
                        تغییر اسم و تاریخ در صورت موجود بودن اتاق، تا ۳ روز قبل از ورود
                        مهمان امکان‌پذیر است.
                    </li>
                    <li>
                        بطال تا ۷۲ ساعت قبل از ورود مهمان، شامل کسر ۵۰٪ هزینه یک شب اقامت
                        هر اتاق می‌شود.
                    </li>
                    <li>
                        ابطال رزرواسیون ۲۴ ساعت قبل از ورود مهمان، شامل سوخت کل هزینه
                        شب‌های اقامت می‌شود.
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container" id="contact/us">
        <div class="footer1">
            <h3>راه های ارتباطی</h3>
            <div class="relation-footer">
                <div class="item-relation">
                    <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 6C11 10.7613 6 13.5 6 13.5C6 13.5 1 10.7613 1 6C1 4.67392 1.52678 3.40215 2.46447 2.46447C3.40215 1.52678 4.67392 1 6 1C7.32608 1 8.59785 1.52678 9.53553 2.46447C10.4732 3.40215 11 4.67392 11 6V6Z" stroke="#FF6D00" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p>نشانی: زعفرانیه، خیابان اعجازی، میدان اعجازی</p>
                </div>
                <div class="item-relation">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 4.5C1.5 10.0227 5.97733 14.5 11.5 14.5H13C13.3978 14.5 13.7794 14.342 14.0607 14.0607C14.342 13.7794 14.5 13.3978 14.5 13V12.0853C14.5 11.7413 14.266 11.4413 13.932 11.358L10.9833 10.6207C10.69 10.5473 10.382 10.6573 10.2013 10.8987L9.55467 11.7607C9.36667 12.0113 9.042 12.122 8.748 12.014C7.65659 11.6128 6.66544 10.9791 5.84319 10.1568C5.02094 9.33456 4.38725 8.34341 3.986 7.252C3.878 6.958 3.98867 6.63333 4.23933 6.44533L5.10133 5.79867C5.34333 5.618 5.45267 5.30933 5.37933 5.01667L4.642 2.068C4.60143 1.9058 4.50781 1.7618 4.37604 1.65889C4.24426 1.55598 4.08187 1.50006 3.91467 1.5H3C2.60218 1.5 2.22064 1.65804 1.93934 1.93934C1.65804 2.22064 1.5 2.60218 1.5 3V4.5Z" stroke="#FF6D00" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p>تلفن: <span dir="ltr">021-22571414-5</span></p>
                </div>
                <div class="item-relation">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 4.5C1.5 10.0227 5.97733 14.5 11.5 14.5H13C13.3978 14.5 13.7794 14.342 14.0607 14.0607C14.342 13.7794 14.5 13.3978 14.5 13V12.0853C14.5 11.7413 14.266 11.4413 13.932 11.358L10.9833 10.6207C10.69 10.5473 10.382 10.6573 10.2013 10.8987L9.55467 11.7607C9.36667 12.0113 9.042 12.122 8.748 12.014C7.65659 11.6128 6.66544 10.9791 5.84319 10.1568C5.02094 9.33456 4.38725 8.34341 3.986 7.252C3.878 6.958 3.98867 6.63333 4.23933 6.44533L5.10133 5.79867C5.34333 5.618 5.45267 5.30933 5.37933 5.01667L4.642 2.068C4.60143 1.9058 4.50781 1.7618 4.37604 1.65889C4.24426 1.55598 4.08187 1.50006 3.91467 1.5H3C2.60218 1.5 2.22064 1.65804 1.93934 1.93934C1.65804 2.22064 1.5 2.60218 1.5 3V4.5Z" stroke="#FF6D00" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p>شماره موبایل: 09906037301</p>
                </div>
                <div class="item-relation">
                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5 2.5V9.5C14.5 9.89782 14.342 10.2794 14.0607 10.5607C13.7794 10.842 13.3978 11 13 11H3C2.60218 11 2.22064 10.842 1.93934 10.5607C1.65804 10.2794 1.5 9.89782 1.5 9.5V2.5M14.5 2.5C14.5 2.10218 14.342 1.72064 14.0607 1.43934C13.7794 1.15804 13.3978 1 13 1H3C2.60218 1 2.22064 1.15804 1.93934 1.43934C1.65804 1.72064 1.5 2.10218 1.5 2.5M14.5 2.5V2.662C14.5 2.9181 14.4345 3.16994 14.3096 3.39353C14.1848 3.61712 14.0047 3.80502 13.7867 3.93933L8.78667 7.016C8.55014 7.16169 8.2778 7.23883 8 7.23883C7.7222 7.23883 7.44986 7.16169 7.21333 7.016L2.21333 3.94C1.99528 3.80569 1.81525 3.61779 1.69038 3.3942C1.56551 3.1706 1.49997 2.91876 1.5 2.66267V2.5" stroke="#FF6D00" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <p>ایمیل: alimahjub.138064m@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer2">
            <div>
                <img src="../image/eita.png" alt="" />
                <img src="../image/eita2.png" alt="" />
            </div>
            <div>
                <p>© تمامی حقوق این سایت متعلق به هتل می باشد</p>
            </div>
            <div class="app">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.625 12C23.625 5.57812 18.4219 0.375 12 0.375C5.57812 0.375 0.375 5.57812 0.375 12C0.375 17.8022 4.62609 22.6116 10.1836 23.4844V15.3605H7.23047V12H10.1836V9.43875C10.1836 6.52547 11.918 4.91625 14.5744 4.91625C15.8466 4.91625 17.1769 5.14313 17.1769 5.14313V8.0025H15.7106C14.2669 8.0025 13.8164 8.89875 13.8164 9.81797V12H17.0405L16.5248 15.3605H13.8164V23.4844C19.3739 22.6116 23.625 17.8022 23.625 12Z" fill="#52575C" />
                </svg>
                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.0049 5.96741C7.88172 5.96741 5.36252 8.50235 5.36252 11.6451C5.36252 14.7878 7.88172 17.3228 11.0049 17.3228C14.1281 17.3228 16.6473 14.7878 16.6473 11.6451C16.6473 8.50235 14.1281 5.96741 11.0049 5.96741ZM11.0049 15.3363C8.98663 15.3363 7.33663 13.6809 7.33663 11.6451C7.33663 9.60923 8.98172 7.95386 11.0049 7.95386C13.0281 7.95386 14.6732 9.60923 14.6732 11.6451C14.6732 13.6809 13.0232 15.3363 11.0049 15.3363ZM18.1942 5.73517C18.1942 6.47144 17.6049 7.05946 16.8781 7.05946C16.1465 7.05946 15.5621 6.46649 15.5621 5.73517C15.5621 5.00384 16.1514 4.41087 16.8781 4.41087C17.6049 4.41087 18.1942 5.00384 18.1942 5.73517ZM21.9313 7.07923C21.8478 5.30526 21.4451 3.7339 20.1536 2.43925C18.867 1.1446 17.3054 0.739404 15.5424 0.650459C13.7255 0.546689 8.27948 0.546689 6.46252 0.650459C4.70449 0.734463 3.14288 1.13966 1.85136 2.43431C0.559842 3.72896 0.162074 5.30032 0.0736816 7.07429C-0.0294434 8.90261 -0.0294434 14.3826 0.0736816 16.2109C0.157164 17.9849 0.559842 19.5563 1.85136 20.8509C3.14288 22.1456 4.69957 22.5508 6.46252 22.6397C8.27948 22.7435 13.7255 22.7435 15.5424 22.6397C17.3054 22.5557 18.867 22.1505 20.1536 20.8509C21.4402 19.5563 21.8429 17.9849 21.9313 16.2109C22.0344 14.3826 22.0344 8.90755 21.9313 7.07923ZM19.5839 18.1727C19.2009 19.1412 18.4594 19.8874 17.492 20.2777C16.0433 20.8559 12.6058 20.7225 11.0049 20.7225C9.40404 20.7225 5.96163 20.8509 4.51788 20.2777C3.55538 19.8923 2.81386 19.1461 2.42591 18.1727C1.85136 16.715 1.98395 13.256 1.98395 11.6451C1.98395 10.0342 1.85627 6.57026 2.42591 5.11749C2.80895 4.14897 3.55047 3.40282 4.51788 3.01245C5.96654 2.43431 9.40404 2.56772 11.0049 2.56772C12.6058 2.56772 16.0482 2.43925 17.492 3.01245C18.4545 3.39788 19.196 4.14403 19.5839 5.11749C20.1585 6.57521 20.0259 10.0342 20.0259 11.6451C20.0259 13.256 20.1585 16.7199 19.5839 18.1727Z" fill="#52575C" />
                </svg>
                <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.533 5.11169C21.5482 5.32488 21.5482 5.53811 21.5482 5.7513C21.5482 12.2538 16.599 19.7462 7.5533 19.7462C4.76648 19.7462 2.17767 18.9391 0 17.5381C0.395953 17.5838 0.776625 17.599 1.18781 17.599C3.48727 17.599 5.60405 16.8224 7.29441 15.4975C5.13197 15.4518 3.31978 14.0356 2.69541 12.0863C3 12.132 3.30455 12.1624 3.62437 12.1624C4.06598 12.1624 4.50764 12.1015 4.91878 11.995C2.66498 11.5381 0.974578 9.55839 0.974578 7.16753V7.10664C1.62937 7.47213 2.39086 7.70055 3.19791 7.73097C1.87303 6.8477 1.00505 5.34011 1.00505 3.63452C1.00505 2.72083 1.24866 1.88327 1.67508 1.1523C4.09641 4.13706 7.73602 6.08627 11.8172 6.2995C11.7411 5.93402 11.6954 5.55335 11.6954 5.17263C11.6954 2.46194 13.8883 0.253845 16.6141 0.253845C18.0304 0.253845 19.3095 0.847752 20.208 1.80714C21.3197 1.59395 22.3857 1.18277 23.3299 0.61933C22.9643 1.76149 22.1877 2.72088 21.1674 3.32997C22.1573 3.22342 23.1167 2.94925 23.9999 2.56858C23.33 3.54316 22.4924 4.41114 21.533 5.11169Z" fill="#52575C" />
                </svg>
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0.387085C5.37256 0.387085 0 5.75965 0 12.3871C0 19.0145 5.37256 24.3871 12 24.3871C18.6274 24.3871 24 19.0145 24 12.3871C24 5.75965 18.6274 0.387085 12 0.387085ZM17.5622 8.54805C17.3816 10.4456 16.6002 15.0502 16.2025 17.1755C16.0343 18.0747 15.7031 18.3762 15.3825 18.4057C14.6857 18.4699 14.1564 17.9452 13.4815 17.5028C12.4253 16.8104 11.8287 16.3795 10.8034 15.7039C9.61868 14.9231 10.3867 14.4942 11.0619 13.7926C11.2386 13.6091 14.309 10.8163 14.3685 10.5629C14.3759 10.5312 14.383 10.4129 14.3126 10.3508C14.2423 10.2887 14.1389 10.3097 14.0641 10.3266C13.9582 10.3507 12.271 11.4659 9.00247 13.6722C8.5236 14.001 8.08982 14.1613 7.70114 14.1529C7.27268 14.1436 6.4485 13.9106 5.83577 13.7114C5.08427 13.4672 4.48698 13.338 4.539 12.9232C4.5661 12.707 4.86368 12.4861 5.43174 12.2603C8.93 10.7361 11.2627 9.73129 12.4299 9.24575C15.7624 7.8596 16.4549 7.61883 16.9062 7.61079C17.0055 7.60915 17.2275 7.63373 17.3712 7.75039C17.4668 7.8335 17.5278 7.94947 17.542 8.07536C17.5664 8.23168 17.5731 8.39023 17.5622 8.54805Z" fill="#52575C" />
                </svg>
            </div>
        </div>
    </div>

    <script src="../js/index.js"></script>
</body>

</html>