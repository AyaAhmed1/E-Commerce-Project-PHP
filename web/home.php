<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/product.php';
include '../model/products.php';
include '../model/categories.php';
include '../model/category.php';
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <style>
            .ui-autocomplete-loading {
                background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
            }
        </style>
        <style>

        </style>
    </head>
    <?php
    if (!isset($_SESSION['userId']) || !$_SESSION['userId']):
        ?>
        <button align="right" onclick="window.location.href = 'register.php'">Sign Up</button>

        <button align="right" onclick="window.location.href = 'login.php'">Sign In</button>
    <?php else:
        ?>
        
        <button onclick="window.location.href = 'account.php'">Account</button>
       
           <button onclick="window.location.href = 'logout.php'">logout</button>

    <?php endif; ?>
    <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1): ?>
    
        <button onclick="window.location.href='addProduct.php'">Add Product </button>
    <?php endif; ?>

    <?php if (isset($_SESSION['userId']) && $_SESSION['userId']): ?>
     
        <button onclick="window.location.href='checkout.php'"> Check Out </button>
        

    <?php endif; ?>



    <div align="center">
        <h1> Shopping Product Home Page </h1>

        <br/>
        <br/>
        <input type="text"  id="search" align="center" placeholder="Search for Products"/>

        <br/>
        <br/>
        <br/>
        <?php
        $productsObj = null;
        $cat = new categories($conn);
        $cat_obj = $cat->getCategories();
        $products = new products($conn);
//print_r($cat_obj);
        if (isset($_GET['id']) && $_GET['id']) {
            $productsObj = $products->filter($_GET['id']);
        } else {
            $productsObj = $products->getAll();
        }
        ?>

    </div>


    <body>

        <br/>
        <br/>
        <br/>
        <div align="center" class="tab">
            <a href ="home.php" align="center"> All </a> 

            <?php foreach ($cat_obj as $cat): ?>
                <span> ......    <span>
                        <a href="home.php?id= <?= $cat->getId() ?>" > <?= $cat->getName() ?> </a> 
                    <?php endforeach; ?>

                    </div>
                    </br>
                    </br>
                    <table border="1px" border_color="black" align="center" width="90%">
                        <tr>
                            <td>Photo</td>
                            <td> Model</td>
                            <td>Price</td>
                            <td>Description </td>
                        </tr> 
                        <?php foreach ($productsObj as $prod): ?>

                            <tr>
                                <td>   <img src="<?= $prod->getPhoto() ?>" width="150"/>
                                    <?php if (isset($_SESSION['userId']) || $_SESSION['userId']): ?>
                                        <button id="<?php echo $prod->getId(); ?>" class="addCart">add to cart</button>
                                        <?php if ($_SESSION['userId'] == 1): ?>

                                            <a href="editProduct.php?id=<?= $prod->getId() ?>">Edit</a>
                         
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>

                                <td>  <a href="productView.php?id=<?= $prod->getId() ?>" >  <?= $prod->getName() ?>  </a> </td>
                                <td>     <?= $prod->getPrice() ?> </td>
                                <td>     <?=substr( $prod->getDescription(),0,100) ?> </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                    </body>

                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                    <script src="js/Handling.js"></script>
                    <script src="js/cart2.js"></script>
                    </html>