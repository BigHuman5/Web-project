<?php

include $_SERVER['DOCUMENT_ROOT'].'/php/util.php';
include $_SERVER['DOCUMENT_ROOT'].'/php/bd.php';
// define('USERS_FILE', "users-file.json");

function createProduct($check,$file)
{
    $link = mysqli_connect('localhost','root','123','web-project');
    // $query = "SELECT Category_Name FROM `category` Where Category_url='$URL';";
    // $result = mysqli_query($link,$query) or die(mysqli_error($link));
    $about = null;
    $f1 = null;
    $f2 = null;
    $about = null;
    $price = null;
    $Name = filter_var($_POST['Name_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['about_prod'] != " ") $about = filter_var($_POST['about_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['filter_1_prod'] != "") $f1 = filter_var($_POST['filter_1_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['filter_2_prod'] != "") $f2 = filter_var($_POST['filter_2_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['price_prod'] != "") $price = filter_var($_POST['price_prod'] ,FILTER_SANITIZE_STRING);
    $URL=$_POST['URL'];
    $query = "SELECT Max(ID) FROM `".$URL."`;";
    $result = mysqli_query($link,$query) or die(mysqli_error($link)); 
    $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result))
                $max=$row['Max(ID)'];
    $max=$max+1;
    
    $query= "INSERT INTO ".$URL."(ID,Name";
    if(isset($f1)) $query=$query.",filter_1";
    if(isset($f2)) $query=$query.",filter_2";
    if(isset($about)) $query=$query.",About";
    if(isset($price)) $query=$query.",Price";

    $query=$query.") VALUES (".$max.",'".$Name."'";
    if(isset($f1)) $f1=",'".$f1."'";
    else $f1="";
    if(isset($f2)) $f2=",'".$f2."'";
    else $f2="";
    if(isset($about)) $about=",'".$about."'";
    else $about="";
    if(isset($price)) $price=",".$price."";
    else $price="";
     
    $query=$query."".$f1."".$f2."".$about."".$price.");";

    $result = mysqli_query($link,$query) or die(mysqli_error($link)); 
    return $max;
}
    // $query = "SELECT Max(Category_ID) FROM `category`;";
    // $result = mysqli_query($link,$query) or die(mysqli_error($link)); 
    // $count = mysqli_num_rows($result);
    // while ($row = mysqli_fetch_array($result))
    //             $max=$row['Max(Category_ID)'];
    // $max=$max+1;
    // if(isset($f1)) $filter1__query=",Category_filter_1";
    // else $filter1__query="";
    // if(isset($f2)) $filter2__query=",Category_filter_2";
    // else $filter2__query="";

    // $img["uploadedFile"]["name"]=$URL.".jpg";

    // $query = "INSERT INTO category (Category_ID,Category_Name,Category_url,Category_img".$filter1__query."".$filter2__query.")
    // VALUES (".$max.",'".$Name."','".$URL."','".$img["uploadedFile"]["name"]."'";
    // if(isset($f1)) $filter1__query=",'".$f1."'";
    // else $filter1__query="";
    // if(isset($f2)) $filter2__query=",'".$f2."'";
    // else $filter2__query="";
    // $query=$query."".$filter1__query."".$filter2__query.");";
    // $result = mysqli_query($link,$query) or die(mysqli_error($link));

    // $query = "SELECT Category_url FROM `category` Where Category_url='$URL';";
    // $result = mysqli_query($link,$query) or die(mysqli_error($link));
    // if(mysqli_num_rows($result) == 0) require($_SERVER['DOCUMENT_ROOT'].'/php/admin/add_categorie.php');

    // $query = "CREATE TABLE ".$URL." (
    //     `ID` int NOT NULL,
    //     `Name` varchar(50) NOT NULL,
    //     `filter_1` varchar(30) DEFAULT NULL,
    //     `filter_2` varchar(30) DEFAULT NULL,
    //     `About` text,
    //     `img_1` varchar(20) DEFAULT NULL,
    //     `img_2` varchar(20) DEFAULT NULL,
    //     `img_3` varchar(20) DEFAULT NULL,
    //     `Price` int DEFAULT NULL
    //   );";
    //   $result = mysqli_query($link,$query) or die(mysqli_error($link));
    //   $query="ALTER TABLE ".$URL." ADD PRIMARY KEY (`ID`);";
    //   $result = mysqli_query($link,$query) or die(mysqli_error($link));
    //   $query="ALTER TABLE ".$URL." MODIFY `ID` int NOT NULL AUTO_INCREMENT;";
    //   $result = mysqli_query($link,$query) or die(mysqli_error($link));


function deleteProd($Path) {
    $link = mysqli_connect('localhost','root','123','web-project');
    $query = "DELETE FROM `".$Path[2]."` Where `ID`=".$Path[3].";";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));
}

function editProd($Path){
    $link = mysqli_connect('localhost','root','123','web-project');

    $about = null;
    $f1 = null;
    $f2 = null;
    $about = null;
    $price = null;
    $Name = filter_var($_POST['Name_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['about_prod'] != " ") $about = filter_var($_POST['about_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['filter_1_prod'] != "") $f1 = filter_var($_POST['filter_1_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['filter_2_prod'] != "") $f2 = filter_var($_POST['filter_2_prod'] ,FILTER_SANITIZE_STRING);
    if($_POST['price_prod'] != "") $price = filter_var($_POST['price_prod'] ,FILTER_SANITIZE_STRING);

    $query="UPDATE ".$Path[2]."
    SET Name='".$Name."',filter_1='".$f1."',filter_2='".$f2."',About='".$about."',Price=".$price." WHERE ID=$Path[3];";
    $result = mysqli_query($link,$query) or die(mysqli_error($link)); 
}

function getProduct($Path) {
    $link = mysqli_connect('localhost','root','123','web-project');
    $query = "SELECT * FROM `".$Path[2]."` Where `ID`=".$Path[3].";";
    $result = mysqli_query($link,$query) or die(mysqli_error($link)); 
    $count = mysqli_num_rows($result);
    if($count == 1){
    while ($row = mysqli_fetch_array($result))
                return $row;
            }
    else header('Location: http://localhos');
}

function getProducts($URL)  {
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
