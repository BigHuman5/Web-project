<?php

include $_SERVER['DOCUMENT_ROOT'].'/php/util.php';
include $_SERVER['DOCUMENT_ROOT'].'/php/bd.php';
// define('USERS_FILE', "users-file.json");

// function createUser($login, $password) {
//     $uuid = randomUuid();
//     $users = getUsers();
//     $user = [
//         "uuid" => $uuid,
//         "login" => $login,
//         "password" => $password,
//         "active" => true
//     ];
//     $users[] = $user;
//     file_put_contents(USERS_FILE, json_encode($users));
//     return $user;
// }

function deleteCat($Path){
    $link = mysqli_connect('localhost','root','123','web-project');
    $query = "SELECT Category_url FROM `category` Where Category_ID='$Path[2]';";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($result))
                $URL_Del=$row['Category_url'];

    $query = "DELETE FROM `category` Where Category_ID=".$Path[2].";";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));

    $query = "DROP TABLE ".$URL_Del.";";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));

    return $URL_Del;
}

function createCategory($Name,$URL,$f1,$f2,$img){
    $link = mysqli_connect('localhost','root','123','web-project');
    $query = "SELECT Category_url FROM `category` Where Category_url='$URL';";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));
    if(mysqli_num_rows($result) != 0) require($_SERVER['DOCUMENT_ROOT'].'/php/admin/add_categorie.php');
    $query = "SELECT Max(Category_ID) FROM `category`;";
    $result = mysqli_query($link,$query) or die(mysqli_error($link)); 
    $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result))
                $max=$row['Max(Category_ID)'];
    $max=$max+1;
    if(isset($f1)) $filter1__query=",Category_filter_1";
    else $filter1__query="";
    if(isset($f2)) $filter2__query=",Category_filter_2";
    else $filter2__query="";

    $img["uploadedFile"]["name"]=$URL.".jpg";

    $query = "INSERT INTO category (Category_ID,Category_Name,Category_url,Category_img".$filter1__query."".$filter2__query.")
    VALUES (".$max.",'".$Name."','".$URL."','".$img["uploadedFile"]["name"]."'";
    if(isset($f1)) $filter1__query=",'".$f1."'";
    else $filter1__query="";
    if(isset($f2)) $filter2__query=",'".$f2."'";
    else $filter2__query="";
    $query=$query."".$filter1__query."".$filter2__query.");";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));

    $query = "SELECT Category_url FROM `category` Where Category_url='$URL';";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));
    if(mysqli_num_rows($result) == 0) require($_SERVER['DOCUMENT_ROOT'].'/php/admin/add_categorie.php');

    $query = "CREATE TABLE ".$URL." (
        `ID` int NOT NULL,
        `Name` varchar(50) NOT NULL,
        `filter_1` varchar(30) DEFAULT NULL,
        `filter_2` varchar(30) DEFAULT NULL,
        `About` text,
        `Price` int DEFAULT NULL
      );";
      $result = mysqli_query($link,$query) or die(mysqli_error($link));
      $query="ALTER TABLE ".$URL." ADD PRIMARY KEY (`ID`);";
      $result = mysqli_query($link,$query) or die(mysqli_error($link));
      $query="ALTER TABLE ".$URL." MODIFY `ID` int NOT NULL;";
      $result = mysqli_query($link,$query) or die(mysqli_error($link));
}


// function deleteUser($uuid) {
//     editUser($uuid, ["active" => false]);
// }

// function editUser($uuid, $attributes) {
//     $users = array_map(function($user) use ($uuid, $attributes) {
//         if ($user["uuid"] == $uuid) {
//             return array_merge($user, $attributes);
//         } else {
//             return $user;
//         }
//     }, getUsers());

//     file_put_contents(USERS_FILE, json_encode($users));
// }

function getCategory($URL) {
    $link = mysqli_connect('localhost','root','123','web-project');
    $URL = substr($URL, 0);
    $query = "SELECT * FROM `category` Where Category_url='$URL';";
    $result = mysqli_query($link,$query) or die(mysqli_error($link)); 
    $count = mysqli_num_rows($result);
    if($count == 1){
    while ($row = mysqli_fetch_array($result))
                return $row;
            }
    else header('Location: http://localhos');
}

// function getCategories()  {
//         $query = "SELECT * FROM `category`;";
//         $result = mysqli_query($link,$query) or die(mysqli_error($link)); 

//         while ($row = mysqli_fetch_array($result))
//         {
//             $row['Category_url'];
//         }
// }
