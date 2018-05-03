<?php

include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/product.php';
include '../model/products.php';

$search_product = new products($conn);
$produ = $search_product->search($_GET['term']);


$return = array();
foreach ($produ as $p) {
    $return[] = array('label' => $p->getName(), 'value' => $p->getId());
}
echo json_encode($return);



