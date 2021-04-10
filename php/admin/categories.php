<?php 
include $_SERVER['DOCUMENT_ROOT'].'/php/header.php';
		if (!isset($_SESSION['admin'])) header('Location: http://localhost/login');

include $_SERVER['DOCUMENT_ROOT'].'/php/bd.php';
$query = "SELECT * FROM `category`;";
$result = mysqli_query($link,$query) or die(mysqli_error($link));
$Table_tr = ' '; 

            while ($row = mysqli_fetch_array($result))
            {
                $Table_tr=$Table_tr."
                <tr>
                <td>".$row['Category_ID']."</td>
                <td>".$row['Category_Name']."</td>
                <td>".$row['Category_Name2']."</td>
                <td>/".$row['Category_url']."</td>
                <td>".$row['Category_filter_1']."</td>
                <td>".$row['Category_filter_2']."</td>
                <td>
                    <a href=/Categories/" .$row['Category_ID']."/edit>
                        <svg class='edit_icon'>
                            <use xlink:href='#edit_icon'></use>
                        </svg>
                    </a>
                </td>";
                if($row['Category_ID'] !=0)
                $Table_tr=$Table_tr."<td>
                    <a href=/Categories/" .$row['Category_ID']."/delete>
                        <svg class='trash_icon'>
                            <use xlink:href='#trash_icon'></use>
                        </svg>
                    </a>
                </td>";
                else ;
                $Table_tr=$Table_tr."</tr>";
            }
?>



<!DOCTYPE html>
<html lang="ru">
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
    <symbol id="new_element" viewBox="0 0 16 16">
        <g>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </g>
    </symbol>
</svg>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление категориями</title>
    <link rel="stylesheet" href="http://localhost/css/style.css" type="text/css" />
</head>
<body>
<div class="container">
<div class="container__addNewElement">
<div class="addNewElement__all">
<a href="/Categories/add">
    <div class="addNewElement">
            <div class="addNewElement__img">
                <svg class='new_element'>
                    <use xlink:href='#new_element'></use>
                </svg>
            </div>
            <div class="addNewElement__text">
            Добавить новую запись
            </div>
    </div>
    </a>
</div>

<table class="table__admin__categories">
  <tr>
    <th>#</th>
    <th>Название</th>
    <th>Вторичное название</th>
    <th>URL</th>
    <th>Первый фильтр</th>
    <th>Второй фильтр</th>
    <th> </th>
    <th> </th>
  </tr>
  <?php echo $Table_tr; ?>
</table>
</div>
</div>
<?php        include 'php/footer.php';    ?>

</body>
</html>