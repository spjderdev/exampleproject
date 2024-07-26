<?php include './components/sidebar.php'?>

<div class="ml-[20rem] mt-[100px]">
    <h1 class="text-white font-bold font-poppins text-[20px]">Edit Category</h1>
    <?php foreach($categories as $category): ?>
    <form method="POST" action="index.php?controller=category&action=edit&id=<?= $category['id'] ?>">

        <label for="name" class="text-white font-bold">Name</label>
        <input type="text" name="name" value="<?=$category['name']?>">

        <button type="submit" name="edit">Edit</button>
    </form>
    <?php endforeach; ?>
</div>