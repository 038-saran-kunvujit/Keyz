<?php 

include('connect.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="website icon" type="png" href="img/logo.png">
<title>Register</title>
</head>
<body class="bg-cover bg-center h-screen bg-opacity-25" style="background-image:url(img/bg.png);">
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
       
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0  dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-black text-center">
                    สร้างบัญชี
                </h1>

<div>
  <form class="space-y-4 md:space-y-6" action="register_db.php" method="post" >
                    <div>
                          <!-- ยูสเซอร์ -->
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">ชื่อผู้ใช้</label>
                      <input type="text" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                  </div>
                    <div>  
                          <!-- ชื่อ -->
                      <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">ชื่อ</label>
                      <input type="text" name="owner_name"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  </div>
                  
                    <div>  
                         <!-- ที่อยู่ -->
                      <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">ที่อยู่</label>
                      <input type="text" name="address"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                  </div>
                  <div>
                      <!-- รหัสผ่าน -->
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">รหัสผ่าน</label>
                        <input type="password" name="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-teal-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                    </div>
                    
                    
                    <div class="flex items-start">
                        
                    </div>
                    <div class="flex justify-center">
                      <button type="submit" name="send" value="submit"  class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                      style="background: linear-gradient(to right, #1A1A1A, #FFD700, #1A1A1A, #1A1A1A);"
                      >สร้างบัญชี</button></a> 
                    </div>
            
                    
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
                        มีบัญชีแล้ว ? <a href="frm_login.php" class="font-medium text-primary-600 hover:underline text-[#776B5D]">เข้าสู่ระบบ</a>
                    </p>
                </form>
                </div>


</body>
</html>
