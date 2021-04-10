<?php 
            require('php/bd.php');
            $query = "Select * from ".$CatName['Category_url'].";";
            $result = mysqli_query($link,$query) or die(mysqli_error($link));
            $i=0;
            while ($res = mysqli_fetch_array($result))
            {
                $result_r['ID'][$i]=$res['ID'];
                $result_r['Name'][$i]=$res['Name'];
                $result_r['About'][$i]=$res['About'];
                $result_r['Price'][$i]=$res['Price'];
                $i++;
            }
?>



<?php
if($i>0){
    for($p=0;$p<=$i-1;$p++)
        {
            echo '<div class="container__product">
                <a href="'.$CatName['Category_url'].'/'.$result_r['ID'][$p].'">
                        <div class="product__image">
                            <img src="http://localhost/img/Products/'.$path[2].'/'.$result_r['ID'][$p].'.jpg" alt="">
                        </div>
                        <div class="product__name">
                            <p>'.$result_r['Name'][$p].'</p>
                        </div>
                        <div class="product__price">
                            <p>'.$result_r['Price'][$p].' ₽</p>
                        </div>
                        <div class="product__description">
                        '.substr($result_r['About'][$p], 0,400).'...
                        </div>
                </a>
            </div>';
        }
}
else{
    echo '<div class="product__error"><h4>Упс... Ничего не найдено!</h4></div>';
}
?>