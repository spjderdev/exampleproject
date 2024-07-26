<?php include './components/sidebar.php'?>

<div class="ml-[20rem] mt-4 w-full max-w-4xl p-4 bg-gray-800 rounded-lg shadow-lg">
    <h1 class="text-white font-poppins font-bold text-3xl mb-6">Post Management</h1>
    <!-- Header Category Management -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-white font-bold text-xl">Post List</h2>
        <a class="text-blue-400 font-bold uppercase text-sm hover:underline" href="index.php?controller=post&action=add">Add new post</a>
    </div>
                
    <!-- Head Category -->
    <div class="grid grid-cols-6 gap-4 text-white font-semibold mb-3 border-b border-gray-600 pb-2">
        <div>ID</div>
        <div>Title</div>
        <div>Description</div>
        <div>Price</div>
        <div>Category</div>
        <div>Action</div>
    </div>
            
    <!-- Content Category -->
    <div class="space-y-3">
        <?php foreach($products as $product): ?>
        <div class="grid grid-cols-6 gap-4 items-center p-3 border border-gray-600 rounded-lg bg-gray-700">
            <span class="text-white text-sm"><?= $product->id ?></span>
            <span class="text-white text-sm"><?= $product->title ?></span>
            <span class="text-white text-sm"><?= $product->description?></span>
            <span class="text-white text-sm"><?= $product->price?></span>
            <span class="text-white text-sm"><?= $product->category_name ?></span>
            <div class="flex space-x-2">
                <a href="index.php?controller=post&action=edit&id=<?= $product->id?>" class="text-green-400 hover:underline text-sm">Edit</a>
                <a href="index.php?controller=post&action=delete&id=<?= $product->id ?>" onClick="return confirm('Are you sure?')" class="text-red-400 hover:underline text-sm">Delete</a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
