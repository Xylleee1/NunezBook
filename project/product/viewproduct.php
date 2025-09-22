<?php
require_once "../classes/product.php";
$productObj = new Product();
$books = $productObj->viewProduct();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="/project/style.css">

</head>
<body>
    <h1>View Books</h1>
    <div class="top-bar">
    <?php if (isset($_GET["success"])): ?>
        <p class="success">Book added successfully!</p>
    <?php endif; ?>

     <a href="/project/product/addproduct.php" style="padding:8px 12px; background:green; color:white; text-decoration:none; border-radius:5px;">
    Add Book
    </a>
    </div>


    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Title </th>
            <th>Author</th>
            <th>Genre</th>
            <th>Publication Year</th>
        </tr>
        <?php if ($books): ?>
            <?php foreach ($books as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product["title"]) ?></td>
                <td><?= htmlspecialchars($product["author"]) ?></td>
                <td><?= htmlspecialchars($product["genre"]) ?></td>
                <td><?= htmlspecialchars($product["publicationYear"]) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No books found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
