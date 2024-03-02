<?php 
    session_start();

     if (!isset($_SESSION['username'])) {
        header('location: frm_login.php');
   }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="website icon" type="png" href="img/logo.png">
    <style>
        .swiper-container {
            height: 400px; /* Set the desired height */
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30%; /* Set the desired height, e.g., half of the container height */
        }

        .swiper-slide img {
            max-width: 100%;
            max-height: 500px;
            object-fit: cover;
        }
    </style>
    <?php require("menu.php"); ?>
</head>
<body class="bg-cover bg-center h-screen bg-opacity-25" >

<div class="swiper mySwiper">
    <div class="swiper-wrapper  ">
      <!-- Slides -->
      <div class="swiper-slide"><img src="img/logo1.png" alt=""></div>
      <div class="swiper-slide"><img src="img/pic2.jpg" alt="" style="width:100%;height:600px;"></div>
      <div class="swiper-slide"><img src="img/pic3.jpg" alt="" style="width:100%;height:600px;"></div>
      <div class="swiper-slide"><img src="img/pic1.jpg" alt="" style="width:100%;height:600px;"></div>
      <div class="swiper-slide"><img src="img/pic5.png" alt="" style="width:100%;height:600px;"></div>
      <!-- ... -->
    </div>
</div>
<h1 class="text-center font-semibold mt-20 mb-10 text-5xl">Welcome To Keyz!!!</h1>
<p class="text-center mt-3 text-2xl">ยินดีต้อนรับเข้าสู่ Keyz ที่จะทำให้คุณเพลิดเพลินไปกับความสนุกและความสะดวกสบาย </p>
<p class="text-center  mt-3 text-2xl">คุณไม่ต้องตื่นกลางดึกเพื่อนำคีย์การ์ดไปให้ลูกค้า ไม่ต้องขับรถหลายนาทีเพื่อไปหาลูกค้า</p>
<p class="text-center  mt-3 text-2xl">เพียงแค่คุณใช้ Keyz ชีวิตคุณจะง่ายขึ้นทันที </p>

  <!-- 1แถว  -->
<div class="bg-yellow-400 mt-20 ">
   <div class="grid grid-cols-5">
        <!-- คอลัมน์ 1 -->
   <div></div>
   <div>
    <!-- คอลัมน์ 2 -->
   <p class="mt-10 ">Mr.Saran Kunvijit 6440011038</p>
   <p class="mt-5 mb-10">Mr.Jakkarawut Pimonsri 6440011010</p>
   </div>
       <!-- คอลัมน์ 3 -->
   <div>
   <p class="mt-10  "><i class="fa-brands fa-facebook fa-lg mr-3"></i>Saran Kunvijit</p>
   <p class="mt-5 mb-10"><i class="fa-brands fa-facebook fa-lg mr-3"></i>Jakkarawut Pimonsri</p>
   </div>
       <!-- คอลัมน์ 4 -->
   <div>   
    <p class="mt-10  "><i class="fa-solid fa-phone fa-lg mr-3"></i>062-219-1880</p>
    <p class="mt-5 mb-10"><i class="fa-solid fa-phone fa-lg mr-3"></i>091-792-6941</p>
   </div>
       <!-- คอลัมน์ 5 -->
   <div></div>
   </div>

</div>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
            },
            speed: 3000,  
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>

 

                
                
</body>
</html>