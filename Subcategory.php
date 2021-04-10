<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список товаров</title>
    <link rel="stylesheet" href="http://localhost/css/style.css" type="text/css" />
</head>

<body>
<svg display=none>
    <symbol id="new_element" viewBox="0 0 16 16">
        <g>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </g>
    </symbol>
</svg>

<?php        include 'php/header.php';    ?>
<div class="container">
    <div class="topcontainer">
    <h2 class="name__subcat"><?php echo $CatName['Category_Name'].'</h2>';
    if (isset($_SESSION['admin']))
    {
        echo "<form action='/Subcategory/add' method='post'>
        <div class='addNewElement__all'>";
            //<a href='/Subcategory/add'>
                echo "<button type='submit'>
                <div class='addNewElement'>
                        <div class='addNewElement__img'>
                            <svg class='new_element'>
                                <use xlink:href='#new_element'></use>
                            </svg>
                        </div>
                        <input name='URL' value='".$path[2]."' style='display: none;'>
                        <div class='addNewElement__text'>
                            Добавить новую запись
                        </div>
                </div>
                        </button> 
                </div>
                </form>";
            //</a>
        //</div>
        //</form>"; 
    }?>
    </div>
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