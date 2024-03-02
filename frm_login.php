<?php 
    session_start();
     include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="website icon" type="png" href="img/logo.png">
    <title>Login</title>
</head>
<body>
<div class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
  <div class="container h-full p-10">
    <div
      class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
      <div class="w-full">
        <div
          class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
          <div class="g-0 lg:flex lg:flex-wrap">
            <!-- Left column container-->
            <div class="px-4 md:px-0 lg:w-6/12">
              <div class="md:mx-6 md:p-12">
                <!--Logo-->
                <div class="text-center">
                  <img
                    class="mx-auto w-48"
                    src="img/logo1.png"
                    alt="" />
                  <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold">
                    Welcome to Keyz
                  </h4>
                </div>

                <form action="login_db.php" method="post">
               
        
                  <!--Username input-->
                  <div for="username" class="relative mb-4">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">ชื่อผู้ใช้</label> 
                    <input
                      type="text" name="username"
                      placeholder="Username"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-teal-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""/>
                   
                  </div>

                  <!--Password input-->
                  <div class="relative mb-4" >
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">รหัสผ่าน</label> 
                    <input
                      type="password" name="password"
                      placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-teal-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""
                       />
                    
                  </div>

                  <!--Submit button-->
                  <div class="mb-12 pb-1 pt-1 text-center">
                    <button  type="submit" name="login" 
                      class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
            
                      
                      
                      style="background: linear-gradient(to right, #1A1A1A, #FFD700, #1A1A1A, #1A1A1A);">
                      เข้าสู่ระบบ
                    </button>

                    <!--Forgot password link-->
                    <a href="#!">ลืมรหัสผ่าน?</a>
                  </div>

                  <!--Register button-->
                  <div class="flex items-center justify-between pb-6">
                    <p class="mb-0 mr-2"></p>
                    <a href="frm_register.php"><button
                      type="button" 
                      class="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" >
                      สร้างบัญชีผู้ใช้?
                    </button></a>
                  </div>
                </form>
              </div>
            </div>

            <!-- Right column container with background and description-->
            <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-full  hidden md:block" src="img/pic1.jpg">
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>