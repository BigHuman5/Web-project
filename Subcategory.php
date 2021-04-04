<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
    <link rel="stylesheet" href="http://localhost/css/style.css" type="text/css" />
</head>

<body>
<?php        include 'php/header.php';    ?>
<div class="container">
    <h2 class="name__subcat"><?php echo $CatName['Category_Name'];
    ?>
    </h2>
    <div class="main__subcat">
        <div class="filters">
        <?php        include 'php/filters.php';    ?>
        </div>



            <div class="catalog__products">
            <?php        include 'php/product.php';    ?>
            </div>
    </div>
</div>

<?php        include 'php/footer.php';    ?>

</body>
</html>