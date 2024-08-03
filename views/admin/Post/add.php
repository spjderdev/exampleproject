
    <div class="flex flex-col">
        <form class="flex flex-col" enctype="multipart/form-data" method="POST">
            <label class="text-white text-bold" for="Title">Title</label>
            <input  class="border" type="text" name="title" placeholder="Title">
            <label class="text-white text-bold" for="Description">Description</label>
            <input class="border" name="description" type="text">
            <label class="text-white text-bold" for="Price">Price</label>
            <input class="border" name="price" type="number">
            <label class="text-white text-bold" for="Category">Category</label>
            <select name="category_id" id="">
                <?php foreach($categories as $category): ?>
                    <option value="<?= $category-> id ?>"><?= $category->name ?></option>
                <?php endforeach;?>
            </select>
            <label for="images">Images</label>
            <input type="file" name="images">
            <label for="video">Video</label>
            <input type="file" name="video">
            <button class="text-white text-bold" type="submit" name="add">Add</button>
        </form>
    </div>
