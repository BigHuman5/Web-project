<?php
$requestUri = $_SERVER["REQUEST_URI"];
if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');
include "categories-model.php";

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

function handleView() {
    require($_SERVER['DOCUMENT_ROOT'].'/php/admin/categories.php');
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
}*/

function handleViewCreate(){
    require($_SERVER['DOCUMENT_ROOT'].'/php/admin/add_categorie.php');
    die();
}

if ($requestUri == "/Categories") handleView();
    // if (is_null($CatName)) {
    //     http_response_code(405);
    //     die();
    // }

    /*if ($path[count($path) - 1] == 'edit') {
        handleEdit($user);
    } else {
        //handleView($CatName);
    //}
}*/
if ($requestUri == "/Categories/add") {
    if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');
        if ($requestMethod == "POST") {
        $Name_Cat = filter_var($_POST['Name_Cat'] ,FILTER_SANITIZE_STRING);
        $URL_address = filter_var($_POST['URL_address'] ,FILTER_SANITIZE_STRING);
        $Filter_1 = filter_var($_POST['filter_1'] ,FILTER_SANITIZE_STRING);
        $Filter_2 = filter_var($_POST['filter_2'] ,FILTER_SANITIZE_STRING);
        if ($_FILES["uploadedFile"]["error"]== 0 && $_FILES["uploadedFile"]["type"] == ("image/jpg" || "image/png")
        && ($_FILES["uploadedFile"]["size"] < 2000000))
        {
            createCategory($Name_Cat,$URL_address,$Filter_1,$Filter_2,$_FILES);
            $_FILES["uploadedFile"]["name"]=$_POST['URL_address'].".jpg";
            $file = $_SERVER['DOCUMENT_ROOT']."/img/subcategory/".$_FILES['uploadedFile']['name'];
            move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $file);
            mkdir($_SERVER['DOCUMENT_ROOT']."/img/Products/".$_POST['URL_address']);
            require($_SERVER['DOCUMENT_ROOT'].'/php/admin/categories.php');
            die();
        }
        else {
            echo $_FILES["uploadedFile"]["error"];
        }
        die();
    }
    else {
        handleViewCreate();
    }
}

if (startsWith($requestUri, "/Categories/")) {
    $path = explode("/", $requestUri);
    if($requestMethod=="GET" && isset($path[3]) && $path[3] == 'delete'){
        if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');
        $URL_Del=deleteCat($path);
        if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$URL_Del))
            rmdir($_SERVER['DOCUMENT_ROOT']."/img/Products/".$URL_Del);
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/subcategory/".$URL_Del.".jpg"))
            unlink($_SERVER['DOCUMENT_ROOT']."/img/subcategory/".$URL_Del.".jpg");
        echo $_SERVER['DOCUMENT_ROOT']."/img/subcategory/".$URL_Del.".jpg";
        header('Location: http://localhost/Categories');
        die();
    }
}

if ($requestUri == "/Categories/") {
    if ($requestMethod == "POST") {
    $Name_Cat = filter_var($_POST['Name_Cat'] ,FILTER_SANITIZE_STRING);
    $URL_address = filter_var($_POST['URL_address'] ,FILTER_SANITIZE_STRING);
    $Filter_1 = filter_var($_POST['filter_1'] ,FILTER_SANITIZE_STRING);
    $Filter_2 = filter_var($_POST['filter_2'] ,FILTER_SANITIZE_STRING);
    if ($_FILES["uploadedFile"]["error"]== 0 && $_FILES["uploadedFile"]["type"] == ("image/jpg" || "image/png")
    && ($_FILES["uploadedFile"]["size"] < 2000000))
    {
        createCategory($Name_Cat,$URL_address,$Filter_1,$Filter_2,$_FILES);
        $_FILES["uploadedFile"]["name"]=$_POST['URL_address'].".jpg";
        $file = $_SERVER['DOCUMENT_ROOT']."/img/subcategory/".$_FILES['uploadedFile']['name'];
        move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $file);
        mkdir($_SERVER['DOCUMENT_ROOT']."/img/Products/".$_POST['URL_address']);
        require($_SERVER['DOCUMENT_ROOT'].'/php/admin/categories.php');
        die();
    }
    else {
        echo $_FILES["uploadedFile"]["error"];
    }
    die();
}
else {
    handleViewCreate();
}
}
/*
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