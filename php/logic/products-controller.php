<?php
$requestUri = $_SERVER["REQUEST_URI"];
	$requestMethod = $_SERVER["REQUEST_METHOD"];
include "products-model.php";

/*if ($requestUri == "/users") {
    $scriptAssets = ["/assets/js/users.js"];

    $handleRequest = function() {
        echo "
    <a href=\"/users/create\" class=\"btn btn-success\">Create new User</a>
    <div id='users-list'></div>
";
    };

    include "layout.php";
    die();
}*/

/*function handleView($CatName) {
        require('Subcategory.php');
    die();
}*/

function handleView($CatName) {
    require('Subcategory.php');
    die();
}

function handleViewProd($ProdName)
{
    require('viewProd.php');
    die();
}

function handleViewEdit(){
    require('php/edit_product.php');
    die();
}

function handleViewCreate($URL){
    require('php/add_product.php');
    die();
}

/*function handleEdit($user) {
    $scriptAssets = ['/assets/js/users-edit.js'];
    $userExists = isset($user["uuid"]);
    $handleRequest = function() use ($user, $userExists) {
        include "templates/userEdit.php";
    };

    include "layout.php";
    die();
}

function handleCreate() {
    $scriptAssets = ['/assets/js/users-edit.js'];
    $user = ["active" => true];
    $userExists = isset($user["uuid"]);

    $handleRequest = function() use ($user, $userExists) {
        include "templates/userEdit.php";
    };

    include "layout.php";
    die();
}

if ($requestUri == "/users/create") {
    handleCreate();
}
*/

if (startsWith($requestUri, "/Subcategory/")) {
    $path = explode("/", $requestUri);
    $CatURL = $path[2];
    if(strripos($CatURL,"?") == false)
    {
        if($requestMethod=="GET" && !isset($path[3])){
            $CatName = getProducts($CatURL);
            if($CatName['Category_url'] == null) header('Location: http://localhost');
            handleView($CatName);
        }
        //if($path[count($path) - 1] == 'add'){
            if($requestMethod=="POST" && $path[count($path) - 1] == 'add'){
            if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');
            if(isset($_POST['Name_prod'])){
                $d=1;
                for($i=1;$i<=3;$i++)
                if ($_FILES["uploadedFile".$i.""]["type"] == ("image/jpg" || "image/png") && ($_FILES["uploadedFile".$i.""]["size"] < 2000000)){
                    if($_FILES["uploadedFile".$i.""]["error"] == 0) { $a[$d]=$i; $d++;}
                     else if($_FILES["uploadedFile".$i.""]["error"] == 4) ;
                     else handleViewCreate($_POST['URL']);
                }
                    $id=createProduct($_POST,$_FILES);
                    for($z=1;$z<=count($a);$z++)
                    {
                        if($z == 1) $_FILES["uploadedFile".$a[$z].""]["name"]=$id.".jpg";
                        else { $p=$z-1; $_FILES["uploadedFile".$a[$z].""]["name"]=$id."_".$p.".jpg"; }
                        $file = $_SERVER['DOCUMENT_ROOT']."/img/Products/".$_POST['URL']."/".$_FILES["uploadedFile".$a[$z].""]["name"];
                        move_uploaded_file($_FILES["uploadedFile".$a[$z].""]['tmp_name'], $file);
                    }
                    header('Location: http://localhost/Subcategory/'.$_POST['URL'].'');
                    //  $_FILES["uploadedFile"]["name"]=$_POST['URL_address'].".jpg";
                    //  $file = $_SERVER['DOCUMENT_ROOT']."/img/subcategory/".$_FILES['uploadedFile']['name'];
                    //  move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $file);
                    //  mkdir($_SERVER['DOCUMENT_ROOT']."/img/Products/".$_POST['URL_address']);
                    //  require($_SERVER['DOCUMENT_ROOT'].'/php/admin/categories.php');
                    //  die();
                
            }
            else handleViewCreate($_POST['URL']);
        }

        if($requestMethod=="GET" && isset($path[4]) && $path[4] == 'delete'){
            session_start();
            if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');
            deleteProd($path);
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3].".jpg"))
            unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3].".jpg");
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_1.jpg"))
            unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_1.jpg");
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_2.jpg"))
            unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_2.jpg");
            header('Location: http://localhost/Subcategory/'.$path[2].'');
            die();
        }

        if($requestMethod=="POST" && isset($path[4]) && $path[4] == 'edit'){
            if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');
            if(isset($_POST['Name_prod']))
            {
            $d=1;
            $a[1]=0;
                for($i=1;$i<=3;$i++)
                if ($_FILES["uploadedFile".$i.""]["type"] == ("image/jpg" || "image/png") && ($_FILES["uploadedFile".$i.""]["size"] < 2000000)){
                    if($_FILES["uploadedFile".$i.""]["error"] == 0) { $a[$d]=$i; $d++;}
                     else if($_FILES["uploadedFile".$i.""]["error"] == 4) ;
                     else handleViewEdit();
                }
                    editProd($path);
                    for($z=1;$z<=count($a);$z++)
                    {
                        if($z == 1) { 
                            $_FILES["uploadedFile".$a[$z].""]["name"]=$path[3].".jpg";
                            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3].".jpg"))
                            unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3].".jpg");
                        }
                        else { $p=$z-1; $_FILES["uploadedFile".$a[$z].""]["name"]=$path[3]."_".$p.".jpg";
                            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_".$p.".jpg"))
                            unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_".$p.".jpg"); }
                        $file = $_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$_FILES["uploadedFile".$a[$z].""]["name"];
                        move_uploaded_file($_FILES["uploadedFile".$a[$z].""]['tmp_name'], $file);
                        header('Location: http://localhost/Subcategory/'.$path[2].'');
                    }
            }
            else handleViewEdit();
            // if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3].".jpg"))
            // unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3].".jpg");
            // if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_1.jpg"))
            // unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_1.jpg");
            // if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_2.jpg"))
            // unlink($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$path[3]."_2.jpg");
            header('Location: http://localhost/Subcategory/'.$path[2].'');
            die();
        }

        if($requestMethod=="GET" && isset($path[3])){
            $path = explode("/", $requestUri);
            $ProdName=getProduct($path);
            handleViewProd($ProdName);
        }
    }
    // if (is_null($CatName)) {
    //     http_response_code(405);
    //     die();
    // }

    /*if ($path[count($path) - 1] == 'edit') {
        handleEdit($user);
    } else {*/
        //handleView($CatName);
    //}
}
/*
if ($requestUri == "/api/users") {
    header('Content-Type: application/json');

    if ($requestMethod == "GET") {
        echo json_encode(getUsers());
        die();
    }

    if ($requestMethod == "POST") {
        $login = filter_var($_POST['login'] ,FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'] ,FILTER_SANITIZE_STRING);
        $password = password_hash($password, PASSWORD_BCRYPT);
        echo json_encode(createUser($login, $password));
        die();
    }
}

if (startsWith($requestUri, "/api/users/")) {
    header('Content-Type: application/json');

    $path = explode("/", $requestUri);
    $userUuid = $path[count($path) - 1];
    $user = getUser($userUuid);

    if (is_null($user)) {
        http_response_code(404);
        die();
    }

    if ($requestMethod == "GET") {
        echo json_encode(getUser($userUuid));
        die();
    }

    if ($requestMethod == "POST") {
        $login = filter_var($_POST['login'] ,FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'] ,FILTER_SANITIZE_STRING);
        $isActive = filter_var($_POST['active'] ,FILTER_SANITIZE_STRING);

        $attributes = [];

        if (!empty($login)) {
            $attributes["login"] = $login;
        }

        if (!empty($password)) {
            $attributes["password"] = password_hash($password, PASSWORD_BCRYPT);
        }

        if (!empty($isActive)) {
            $attributes["active"] = $isActive == 'true';
        }

        editUser($userUuid, $attributes);
        die();
    }

    if ($requestMethod == "DELETE") {
        deleteUser($userUuid);
        die();
    }
}*/