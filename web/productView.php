<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/product.php';
include '../model/products.php';
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
        <?php
        $product_to_view = null;
        $prodouct = new products($conn);
        if (isset($_GET['id']) && $_GET['id']) {
        $product_to_view= $prodouct->getProduct($_GET['id']);
        
         }
            else {
            echo 'not found';
                }
                
                 //  echo '<pre>';
         // print_r($product_to_view);
           //echo '</pre>'
        ?>
    
    <div class="one" >
        <h1 align="center" > <?= $product_to_view['name']  ?> </h1>
        <br>
        <br>
        <div align="center" > <img src="<?= $product_to_view['photo']  ?>" width="300"/> </div>
        <h2 align ="center"> Price = <?=$product_to_view['price']  ?> </h2> 
        <p align="center"> Description <?=$product_to_view['description'] ?> </p>
        
        
        
    </div>
       


</html>


