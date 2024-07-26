<!-- component -->
<header class="header sticky z-10 top-0 bg-customBlack flex items-center justify-between px-8 py-02 shadow-2xl">
    <!-- logo -->
    <h1 class="w-1/6 flex items-center justify-between">
        <a href="">
          <img class="w-defaultLogo"src="public/images/logo.png" alt="">
        </a>
        <div class="h-8 w-px bg-white"></div>
        <a href="" class="text-white font-poppins font-bold">VALORANT STORE</a>
      </h1>

    <!-- buttons --->
    <div class="w-3/12 flex justify-end">
        <a href="">
            <svg class="h-8 p-1 mr-3 text-white hover:text-redCustom duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-7x"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path></svg>
        </a>
        <?php 
          session_start();
          $isLogged = isset($_SESSION['user_id']);
          $isAdmin = false;
          if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            $isAdmin = true;
          }

        ?>
        
        <?php if($isLogged && !$isAdmin) : ?>
          <a href="index.php?controller=account&action=logout" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
          Log out
        <?php endif; ?>

        <?php if(!$isLogged): ?>
          <a href="index.php?controller=account&action=signin" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
          Sign in
        <?php endif; ?>

        <?php if($isAdmin): ?>
          <a href="index.php?controller=dashboard&action=home" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">Go to dashboard</a>
        <?php endif; ?>
    </a>

    </div>

</header>