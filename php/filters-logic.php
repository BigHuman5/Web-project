<?php
$requestUri = $_SERVER["REQUEST_URI"];
$path = explode("/", $requestUri);
$CatURL = $path[2];
if(strripos($CatURL,"?") == true)
{
    $path_get_block = explode("?", $requestUri);
    $path_get_check = explode("&", $path_get_block[1]);
    echo $CatName;
    echo '<br>';
    echo str_replace("%2B","+",$path_get_check[0]);
    echo '<br>';
    echo str_replace("+"," ",$path_get_check[1]);
    echo '<br>';
    echo $path_get_check[2];
    echo '<br>';
    echo $path_get_check[3];
    echo '<br>';
}
else ;
?>