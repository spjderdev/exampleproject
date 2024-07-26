<?php include './components/navbar.php' ?> 

<div class="flex z-0">
    <div class="relative w-full">
        <img class="w-full h-[600px] object-cover" src="./public/images/bannerseed.jpg" alt="">
        <div class="absolute top-[100px] left-[120px] w-[500px]">
            <h1 class="text-8xl text-white font-big">NEW VANDAL ARRIVED</h1>
            <p class="text-xl text-white font-poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ipsa cupiditate placeat iusto quo nostrum nobis? Commodi quasi hic repudiandae doloribus inventore repellendus, beatae vel! Facilis corporis iure ipsam facere?</p>
        </div>

        <div class="absolute top-0 right-0">
            <img class="w-full h-[600px] object-cover"src="./public/images/seedingagent.png" alt="">
        </div>
    </div>
</div>


<div>
    <h1 class="text-white text-4xl uppercase font-big">New Skin In Valorant</h1> 
    <?php foreach($products as $product): ?>
        <ul class="text-white">
            <li><?= $product -> category_name?></li>
            <li><a href="" class="font-poppins uppercase"><?= $product-> title?></a></li>
            <li> <?= $product-> description?> </li>
            <li> <?= $product-> price?> </li>
            <li><img class="w-[200px] h-[100px]" src="./public/images/<?= $product->images ?>" alt=""></li>
        </ul>
    <?php endforeach; ?>
</div>