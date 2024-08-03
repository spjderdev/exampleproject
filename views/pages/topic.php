<?php include './components/testsidebar.php' ?>


<div class="ml-[20rem] max-w-full p-6">
    <div class="bg-gray-900 rounded-lg overflow-hidden shadow-xl flex flex-wrap md:flex-nowrap items-center p-6 gap-6">
        <video class="w-full md:w-[50%] rounded-lg shadow-md" src="./public/video/<?= htmlspecialchars($products['video']) ?>" loop muted autoplay></video>
        <div class="flex flex-col w-full md:w-[50%] text-white space-y-4 p-4">
            <span class="text-4xl font-bold font-custom uppercase"><?= htmlspecialchars($products['category_name']) ?></span>
            <span class="text-2xl font-semibold font-TungstenFont uppercase"><?= htmlspecialchars($products['title']) ?></span>
            <span class="text-lg font-medium"><?= htmlspecialchars($products['description']) ?></span>
            <a href="index.php?controller=account&action=signin" class="bg-red-600 hover:bg-red-700 text-white uppercase py-3 px-6 flex items-center justify-center rounded-lg font-bold transition duration-300 transform hover:scale-105">
                Add to cart
            </a>
        </div>
    </div>
</div>
