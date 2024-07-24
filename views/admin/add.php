
    <div class="flex flex-col">
        <form class="flex flex-col" action="index.php?controller=dashboard&action=add" enctype="multipart/form-data" method="POST">
            <label for="Title">Title</label>
            <input  class="border" type="text" name="title" placeholder="Title">
            <label for="Description">Description</label>
            <input class="border" name="description" type="text">
            <label for="Price">Price</label>
            <input class="border" name="price" type="number">
            <label for="Category">Category</label>
            <select name="category_id" id="">
                <option value="1">Vandal</option>
                <option value="2">Phantom</option>
                <option value="3">Sheriff</option>
                <option value="4">Melee</option>
            </select>
            <label for="images">Images</label>
            <input type="file" name="images">
            <button type="submit" name="add">Add</button>
        </form>
    </div>
