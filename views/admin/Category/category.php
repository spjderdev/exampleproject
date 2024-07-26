<?php include './components/sidebar.php'; ?>
<body>

        <div class="ml-[20rem] mt-[100px] w-[1200px] p-6 bg-gray-800 rounded-lg shadow-lg">
                <h1 class="text-white font-poppins font-bold text-[48px] mb-8">Category Management</h1>
            
                <!-- Header Category Management -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-white font-bold text-[24px]">Category List</h2>
                    <a class="text-blue-400 font-bold uppercase text-[18px] hover:underline" href="index.php?controller=category&action=add">Add new category</a>
                </div>
                
                <!-- Head Category -->
                <div class="grid grid-cols-4 gap-6 text-white font-semibold mb-4 border-b border-gray-600 pb-3">
                    <div class="text-lg">ID</div>
                    <div class="text-lg">Name Category</div>
                    <div class="text-lg">Posts</div>
                    <div class="text-lg">Action</div>
                </div>
            
                <!-- Content Category -->
                <div class="space-y-4">
                    <?php foreach($categories as $category): ?>
                    <div class="grid grid-cols-4 gap-6 items-center p-4 border border-gray-600 rounded-lg bg-gray-700">
                        <span class="text-white text-xl"><?= $category->id ?></span>
                        <span class="text-white text-xl"><?= $category->name ?></span>
                        <?php 
                            $productCount = array_filter($countProduct, function($count) use ($category) {
                                return $count['id'] == $category->id;
                            });
                            $productCount = !empty($productCount) ? reset($productCount)['product_count'] : 0;
                        ?>
                        <span class="text-white text-xl"><?= $productCount ?></span>
                        <div class="flex space-x-4">
                            <a href="index.php?controller=category&action=edit&id=<?= $category->id?>" class="text-green-400 hover:underline text-lg">Edit</a>
                            <a href="#" class="text-red-400 hover:underline text-lg">Delete</a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
        </div>
</body>

