<?php

$requestUri = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];
$path = explode("/", $requestUri);
$CatURL = $path[1];
if ($CatURL == "") {
    include "index-lag.php";
    die();
}

if ($CatURL == "login") {
    include "login.php";
    die();
}
if($CatURL == "Subcategory")
{
include "php/logic/products-controller.php";
}
if($CatURL == "Categories")
{
include "php/logic/categories-controller.php";
}
?>