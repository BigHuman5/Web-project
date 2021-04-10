<?php 
include $_SERVER['DOCUMENT_ROOT'].'/php/bd.php';
include $_SERVER['DOCUMENT_ROOT'].'/php/header.php';
		if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');      
            $query = "SELECT Category_Name,Category_filter_1,Category_filter_2 FROM `category` Where Category_url='$URL';";
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
            while ($row = mysqli_fetch_array($result)) {
                $Name=$row['Category_Name'];
                $f1=$row['Category_filter_1'];
                $f2=$row['Category_filter_2'];
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
    <div class="add_new">Добавление нового товара в <?php echo $Name ?></div>
    <div class="Add__Categ__container">
    <?php echo  "<form id= 'AddProduct'action='/Subcategory/add' method='post' enctype='multipart/form-data'>"; ?>
    <?php echo "<input name='URL' value='".$URL."' style='display: none;'>" ?>
    <div class="row">
      <div class="col-30">
        <label for="Name">Напишите название продукта</label>
      </div>
      <div class="col-45">
      <input type="text" id="Name" maxlength="30" name="Name_prod" placeholder="Напишите название продукта">
    </div>
    </div>
    <div class="row">
      <div class="col-30">
        <label for="about">Напишите описание продукта</label>
      </div>
      <div class="col-45">
        <textarea wrap="soft" style="resize: none; height: 100;" maxlength="1000" id="about" name="about_prod" placeholder="Напишите описание продукта"> </textarea>
    </div>
    </div>
    <div class="row">
      <div class="col-30">
        <label for="filter_1"><?php echo $f1 ?></label>
      </div>
      <div class="col-45">
        <input type="text" id="filter_1" maxlength="30" name="filter_1_prod" placeholder="Напишите первый фильтр">
      </div>
    </div>
    <div class="row">
        <div class="col-30">
        <label for="filter_2"><?php echo $f2 ?></label>
        </div>
      <div class="col-45">
        <input type="text" id="filter_2" maxlength="30" name="filter_2_prod" placeholder="Напишите второй фильтр">
      </div>
    </div>
    <div class="row">
        <div class="col-30">
        <label for="price">Цена</label>
        </div>
      <div class="col-45">
        <input type="text" maxlength="6" id="price" name="price_prod" placeholder="Цена товара">
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
      <input type="submit" value="Добавить новый элемент">
    </div>
  </form>
</div>
</div>
</body>
</html>