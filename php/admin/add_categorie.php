<?php 
include $_SERVER['DOCUMENT_ROOT'].'/php/header.php';
		if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление новой категории</title>
    <link rel="stylesheet" href="http://localhost/css/style.css" type="text/css" />
</head>
<body>
<div class="container">
    <div class="Add__Categ__container">
    <?php echo  "<form action='/Categories/add' method='post' enctype='multipart/form-data'>"; ?>
    
    <div class="row">
      <div class="col-30">
        <label for="name">Название</label>
      </div>
      <div class="col-45">
        <input type="text" id="name" name="Name_Cat" placeholder="Введите название категории"
        <?php if(isset($Name)) echo "value=".$Name; ?>
      ></div>
    </div>
    <div class="row">
      <div class="col-30">
        <label for="URL">URL адрес</label>
      </div>
      <div class="col-45">
        <input type="text" id="URL" name="URL_address" placeholder="Придумайте уникальный URL адрес"
        <?php if(isset($URL)) {
          echo "value=".$URL.">";
        echo "<div class='error__massage_add'>Ошибка! /".$URL." уже существует.</div>";
      }
        else echo '>'; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-30">
        <label for="URL">Фильтр №1</label>
      </div>
      <div class="col-45">
        <input type="text" id="URL" name="filter_1" placeholder="Придумайте фильтр №1 для категории"
        <?php if(isset($f1)) echo "value=".$f1; ?>
        >
      </div>
    </div>
    <div class="row">
        <div class="col-30">
        <label for="URL">Фильтр №2</label>
        </div>
      <div class="col-45">
        <input type="text" id="URL" name="filter_2" placeholder="Придумайте фильтр №2 для категории"
        <?php if(isset($f2)) echo "value=".$f2; ?>
        >
      </div>
    </div>
    <div class="row_file">
      <input type="file" name="uploadedFile" accept='image/jpeg,image/png'>
    </div>
    <div class="row">
      <input type="submit" value="Добавить новый элемент">
    </div>
  </form>
</div>
</div>
</body>
</html>