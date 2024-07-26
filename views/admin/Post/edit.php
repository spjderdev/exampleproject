
<div class="flex flex-col">
        <form class="flex flex-col" enctype="multipart/form-data" method="POST">

            <label class="text-white text-bold" for="Title">
                Title
            </label>
            <input  class="border" type="text" name="title" value="<?= $products['title']?>">

            <label class="text-white text-bold" for="Description">
                Description</label>
            <input class="border" name="description" value="<?= $products['description']?>" type="text">

            <label class="text-white text-bold" for="Price">
                Price
            </label>
            <input class="border" name="price" value="<?= $products['price']?>"type="number">

            <label class="text-white text-bold" for="Category">
                Category
            </label>

            <select name="category_id" id="">
                <?php foreach($categories as $category):?>
                    <option value="<?= $category->id?>"
                        <?= $category->id == $products['category_id'] ? 'selected' : ''?>>
                        <?= $category->name?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="images">Images</label>
            <img class ="w-[100px] h-[100px]"src="./public/images/<?=$products['images']?>" alt="">
            <input type="file" name="images">
            <button class="text-white text-bold" type="submit" name="edit">Edit</button>
        </form>
    </div>
