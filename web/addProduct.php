<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/product.php';
include '../model/products.php';

$errorName = $errorPrice = $errorCategory = "";
if (!empty($_POST)) {
    if (!isset($_POST['name']) || !$_POST['name']) {
        $errorName .= "This Field required.";
    }

    if (!isset($_POST['price']) || !$_POST['price']) {
        $errorPrice .= "This Field required.";
    }
    if (!isset($_POST['category']) || !$_POST['category']) {
        $errorCategory .= "This Field required.";
    }
    if ($errorName == "" && $errorPrice == "" && $errorCategory == "") {
        $product = new product($conn);
        //mysqli_query($conn, $sql)
        $filename = $_FILES['imgToUpload']['tmp_name'];
        $filePath = '/upload/' . time() . '.png';
        $destination = __DIR__ . $filePath;
        if (!move_uploaded_file($filename, $destination)) {
             $filePath ='/upload/1.jpg';
        }
        $product->setPhoto($filePath);
        $product->setName($_POST['name']);
        $product->setDescription($_POST['description']);
        $product->setPrice($_POST['price']);
        $product->setCategoryid($_POST['category']);
        $product->save();

        header("Location: home.php");
        alert("product added");
        exit;
    }
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
         <h4>
        Add New Product
    </h4>
        <br/>
        
        
        <form method="post" enctype="multipart/form-data">
         


            name<input name="name"  />
            <br/>
            <br/>
<?php echo $errorName ?>
            <br/>
            description<input name="description"  />
            <br/>
            <br/>

            price<input name="price"  />
            <br/>
            
            <br/>
<?php echo $errorPrice ?>
            <br/>

            category</br><input type="checkbox" name="category" value="1" />samsung
            </br>
            <input type="checkbox" name="category" value="2"/>LG
            <br/>
            <input type="checkbox" name="category" value="3"/>Apple
            </br>
            <input type="checkbox" name="category" value="4"/>Nokia
<?php echo $errorCategory ?>
            </br>
            </br>
             Select image to upload:
            <input type="file" name="imgToUpload" id="imgToUpload">
            <br/>
            <br/>
            <button type="submit">add</button>
        </form>
    </div>
</html>
