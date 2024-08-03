<?php include './components/testsidebar.php'?>



<div class="ml-[20rem] mt-[20px] mb-[10px]">
    <div class="flex max-w-full justify-between items-center">
        <div class="text-white font-bold font-custom">Valorant Store</div>
            <div class="flex">
                <a href="index.php?controller=account&action=signin" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
                Sign in
                </a>
                <a href="index.php?controller=account&action=signup" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
                Sign up
                </a>
            </div>
    </div>    
</div>

<div class="ml-[20rem] max-w-full">
    <img src="./public/images/banner.jpg" alt="">
    <div class="grid grid-cols-4 mt-[20px] gap-[10px]">
        <div class="relative border-white border-[2px] bg-[url('/project/public/images/valorantlogo.jpg')] flex h-[150px] bg-stretch bg-center">
            <div class="w-1/2 flex flex-col items-center justify-center gap-[20px]">
                <p class="text-white font-bold font-custom uppercase">free to play</p>
                <a href="index.php?controller=account&action=signup" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
                PLAY
                </a>
            </div>
            <div class="absolute w-[162px] right-0">
                <img src="./public/images/seedingagent.png" alt="">
            </div>
        </div>

        <div class="relative border-white border-[2px] bg-[url('/project/public/images/valorantlogo.jpg')] flex h-[150px] bg-stretch bg-center">
            <div class="w-1/2 flex flex-col items-center justify-center gap-[20px]">
                <p class="text-white font-bold font-custom uppercase">category</p>
                <a href="index.php?controller=account&action=signup" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
                CHECK
                </a>
            </div>
            <div class="absolute w-[162px] right-0">
                <img src="./public/images/seedingagent.png" alt="">
            </div>
        </div>

        <div class="relative border-white border-[2px] bg-[url('/project/public/images/valorantlogo.jpg')] flex h-[150px] bg-stretch bg-center">
            <div class="w-1/2 flex flex-col items-center justify-center gap-[20px]">
                <p class="text-white font-bold font-custom uppercase text-center">support</p>
                <a href="index.php?controller=account&action=signup" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
                PLAY
                </a>
            </div>
            <div class="absolute w-[162px] right-0">
                <img src="./public/images/seedingagent.png" alt="">
            </div>
        </div>

        <div class="relative border-white border-[2px] bg-[url('/project/public/images/valorantlogo.jpg')] flex h-[150px] bg-stretch bg-center">
            <div class="w-1/2 flex flex-col items-center justify-center gap-[20px]">
                <p class="text-white font-bold font-custom uppercase">esports</p>
                <a href="index.php?controller=account&action=signup" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center ml-1  duration-200 font-bold">
                PLAY
                </a>
            </div>
            <div class="absolute w-[162px] right-0">
                <img src="./public/images/seedingagent.png" alt="">
            </div>
        </div>
        
    </div>

    <div>
        <h1 class="text-white font-bold font-TungstenFont text-[20px] mt-[20px]">Category</h1>
        <div class="grid grid-cols-4 mt-[20px] gap-[10px]">
            <?php foreach($products as $product):?>
            <div class="flex flex-col border-white border-[1px] p-[10px]">
                <img  class="h-[150px] w-full" src="./public/images/<?= $product -> images ?>" alt="">
                <span class="text-white font-bold font-TungstenFont uppercase">
                    Category: <?= $product -> category_name?>                
                </span>
                <span class="text-white font-bold font-custom uppercase">
                    <?= $product -> title ?>
                </span>
                <span class="text-white font-poppins">
                    <?= $product -> description ?>
                </span>
                <span class="text-white font-poppins font-semibold">
                    <?= $product -> price ?> VP
                </span>
                <a href="index.php?controller=topic&action=show&id=<?= $product -> id ?>" class="bg-redCustom uppercase text-white h-8 p-4 flex items-center justify-center duration-200 font-bold">
                Buy
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>


