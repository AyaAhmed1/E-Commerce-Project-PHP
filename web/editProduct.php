<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/product.php';
include '../model/products.php';

session_start();
$productId = $_GET['id'];

$products = new products($conn);
        $productsObj = $products->getProduct($productId);
$product = new product($conn,$productsObj);

if(!empty($_POST))
{
    $filename = $_FILES['imgToUpload']['tmp_name'];
    $filePath = '/upload/' . time() . '.png';
    $destination = __DIR__ . $filePath;
    if(!move_uploaded_file($filename, $destination))
    {
       $filePath=$product->getPhoto() ;
    }
    $product->setPhoto($filePath);
    $product->setName($_POST['name']);
    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);
    $product->setCategoryid($_POST['category']);
    $product->update();

    header("Location: productView.php?id=$productId");
    exit;
}
?>
<html>
       <head>
        <style>
            .one {
                border-style: solid;
                border-width: 5px;
            }
        </style>

    </head>
    <div align="center" class="one">
<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="imgToUpload" id="imgToUpload">
    <br/>
    name<input name="name" value="<?= $product->getName() ?>" />
    <br/>
    description<input name="description" value="<?= $product->getDescription() ?>" />
    <br/>
    price<input name="price" value="<?= $product->getPrice() ?>" />
    <br/>
    category</br><input type="checkbox" name="category" value="1" checked/>samsung
    </br>
    <input type="checkbox" name="category" value="2"/>iphone
    <br/>
    <input type="checkbox" name="category" value="3"/>nokia
    </br>
    </br>
    <button type="submit">Update</button>
</form>
        </div>
    </html>