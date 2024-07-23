<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php foreach($products as $product): ?>
        <ul>
            <li><?= $product->id?></li>
            <li><?= $product->title?></li>
            <li><?= $product->description?></li>
            <li><?= $product->price?></li>
            <li><img src="<?= $product->images?>" alt=""></li>
        </ul>
        <?php endforeach; ?>
</body>
</html>