<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест проджект</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
<?php        include 'php/header.php';    ?> 
<div class="container">
    <div class="main">
        <div class="subcategory">
            <?php 
            require('php/bd.php');
            $query = "SELECT * FROM `category`;";
            $result = mysqli_query($link,$query) or die(mysqli_error($link)); 

            while ($row = mysqli_fetch_array($result))
            {
                echo "<a class='subcategory__item' href=/Subcategory/" .$row['Category_url'].">";
                echo "<div class='item__picture'><img src='img/subcategory/".$row['Category_img']."'></div>";
                echo "<span class='item__text'>".$row['Category_Name']."</span>";
                echo "</a>";
            }
            ?>
        </div>
    </div>
</div>

<?php        include 'php/footer.php';    ?>

</body>
</html>