<?php
session_start();
if($_SESSION['prodId'] == NULL){
    $_SESSION['prodId'] = array();
}
array_push($_SESSION['prodId'],$_POST['text']);

foreach($_SESSION['prodId'] as $result) {
 
}
 $output =[];
 
 $output=$_SESSION['prodId'];
 
 echo json_encode($output);

?>