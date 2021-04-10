<?php
$requestUri = $_SERVER["REQUEST_URI"];
$path = explode("/", $requestUri);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Название</title>
    <link rel="stylesheet" href="http://localhost/css/style.css" type="text/css" />
</head>

<body>
<svg style="display: none;">
    <symbol id="trash_icon" viewBox="0 0 16 16">
        <g>
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </g>
    </symbol>
    <symbol id="edit_icon" viewBox="0 0 16 16">
        <g>
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
        </g>
    </symbol>
</svg>
<?php        include 'php/header.php';    ?> 
<div class="container">
    <div class="main">
        <div class="subcategory">
            <?php
            //file_exists();
            echo "<div class='item__picture'><img src='http://localhost/img/Products/".$path[2]."/".$ProdName['ID'].".jpg'></div>";
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$ProdName['ID']."_1.jpg")) 
            echo "<div class='item__picture'><img src='http://localhost/img/Products/".$path[2]."/".$ProdName['ID']."_1.jpg'></div>";
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/img/Products/".$path[2]."/".$ProdName['ID']."_2.jpg")) 
            echo "<div class='item__picture'><img src='http://localhost/img/Products/".$path[2]."/".$ProdName['ID']."_2.jpg'></div>";
            echo $ProdName['Name'];
            echo "<br>";
            echo $ProdName['About'];
            echo "<br>";
            echo $ProdName['Price'];
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<a href=/Subcategory/".$path[2]."/".$path[3]."/delete>
                        <svg class='trash_icon'>
                            <use xlink:href='#trash_icon'></use>
                        </svg>
                    </a>";
            echo "<br>";
            echo "<form action='/Subcategory/".$path[2]."/".$path[3]."/edit' method='post'>
            <div class='button_edit'>
            <button type='submit'>
                    <svg class='edit_icon'>
                    
                        <use xlink:href='#edit_icon'></use>
                    
                    </svg>
                    </button>
                    </div>
                </form>";
            // echo "<a class='subcategory__item' href=/Subcategory/" .$row['Category_url'].">";
                // echo "<div class='item__picture'><img src='img/subcategory/".$row['Category_img']."'></div>";
                // echo "<span class='item__text'>".$row['Category_Name']."</span>";
                // echo "</a>";
                //<a href=/Subcategory/".$path[2]."/".$path[3]."/edit>

            ?>
        </div>
    </div>
</div>

<?php        include 'php/footer.php';    ?>
</body>
</html>
