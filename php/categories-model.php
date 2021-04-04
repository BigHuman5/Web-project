<?php

include "util.php";
include "bd.php";
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
