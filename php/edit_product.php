<?php 
include $_SERVER['DOCUMENT_ROOT'].'/php/bd.php';
include $_SERVER['DOCUMENT_ROOT'].'/php/header.php';
$requestUri = $_SERVER["REQUEST_URI"];
$path = explode("/", $requestUri);
		if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');      
            $query = "SELECT Category_ID,Category_Name,Category_filter_1,Category_filter_2 FROM `category` Where Category_url='$path[2]';";
            // echo $query;
            // die();
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
            while ($row = mysqli_fetch_array($result)) {
                $id=$row['Category_ID'];
                $Name=$row['Category_Name'];
                $f1=$row['Category_filter_1'];
                $f2=$row['Category_filter_2'];
            }
            $query = "SELECT * FROM `".$path[2]."`;";
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
            while ($row = mysqli_fetch_array($result)) {
                $id_d=$row['ID'];
                $Name_d=$row['Name'];
                $f1_d=$row['filter_1'];
                $f2_d=$row['filter_2'];
                $About_d=$row['About'];
                $price_d=$row['Price'];
            }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление нового товара</title>
    <link rel="stylesheet" href="http://localhost/css/style.css" type="text/css" />
</head>
<body>
<div class="container">
    <div class="add_new">Изменение товара с номером <?php echo $id_d ?></div>
    <div class="Add__Categ__container">
    <?php echo  "<form id= 'AddProduct'action='/Subcategory/".$path[2]."/".$path[3]."/edit' method='POST' enctype='multipart/form-data'>"; ?>
    <div class="row">
      <div class="col-30">
        <label for="Name">Название продукта</label>
      </div>
      <div class="col-45">
      <input type="text" id="Name" maxlength="30" name="Name_prod" value="<?php echo $Name_d ?>">
    </div>
    </div>
    <div class="row">
      <div class="col-30">
        <label for="about">Описание продукта</label>
      </div>
      <div class="col-45">
        <textarea wrap="soft" style="resize: none; height: 100;" maxlength="1000" id="about" name="about_prod"><?php echo $About_d ?> </textarea>
    </div>
    </div>
    <div class="row">
      <div class="col-30">
        <label for="filter_1"><?php echo $f1 ?></label>
      </div>
      <div class="col-45">
        <input type="text" id="filter_1" maxlength="30" name="filter_1_prod" value="<?php echo $f1_d ?>">
      </div>
    </div>
    <div class="row">
        <div class="col-30">
        <label for="filter_2"><?php echo $f2 ?></label>
        </div>
      <div class="col-45">
        <input type="text" id="filter_2" maxlength="30" name="filter_2_prod" value="<?php echo $f2_d ?>">
      </div>
    </div>
    <div class="row">
        <div class="col-30">
        <label for="price">Цена</label>
        </div>
      <div class="col-45">
        <input type="text" maxlength="6" id="price" name="price_prod" value="<?php echo $price_d ?>">
      </div>
    </div>
    <div class="row_file">
    <div class="row">
        <div class="col-30">
        <label for="img1">1 изображение</label>
        </div>
      <div class="col-45">
      <input type="file" id="img1" name="uploadedFile1" accept='image/jpeg,image/png'>
      </div>
    </div>

    <div class="row">
        <div class="col-30">
        <label for="img2">2 изображение</label>
        </div>
      <div class="col-45">
      <input type="file" id="img2" name="uploadedFile2" accept='image/jpeg,image/png'>
      </div>
    </div>

    <div class="row">
        <div class="col-30">
        <label for="img3">3 изображение</label>
        </div>
      <div class="col-45">
      <input type="file" id="img3" name="uploadedFile3" accept='image/jpeg,image/png'>
      </div>
    </div>
    </div>
    <div class="row">
      <input type="submit" value="Редактировать элемент">
    </div>
  </form>
</div>
</div>
</body>
</html>