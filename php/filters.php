<?php
$requestUri = $_SERVER["REQUEST_URI"];
$path = explode("/", $requestUri);
$CatURL = $path[2];
    //require('php/filters-logic.php');
    require('php/bd.php');
    $query_1fil = "Select filter_1,COUNT(filter_1) from ".$CatName['Category_url']." GROUP By filter_1;";
    $result = mysqli_query($link,$query_1fil) or die(mysqli_error($link)); 
    $i=0;
    while ($filter = mysqli_fetch_array($result))
    {
        $filter_r['filter_1'][$i]=$filter['filter_1'];
        $i++;
    }
    $query_2fil = "Select filter_2,COUNT(filter_2) from ".$CatName['Category_url']." GROUP By filter_2;";
    $result = mysqli_query($link,$query_2fil) or die(mysqli_error($link)); 
    $i=0;
    while ($filter = mysqli_fetch_array($result))
    {
        $filter_r['filter_2'][$i]=$filter['filter_2'];
        $i++;
    }
    //
?>

<!-- header('Location: http://localhost'.$path_get_block[0].''); -->

<?php
echo '<form action="/Subcategory/'.$CatName['Category_url'].'" method="get">';
            for($d=1;$d<=2;$d++)
            {
                if(isset($filter_r['filter_'.$d.''])){
                echo' <div class="filter__category">
                    <div class="filter__name">
                        <p>
                        '.$CatName['Category_filter_'.$d.''].'
                        </p>
                    </div>
                        <div class="filter__list">';
                        for($p=0;$p<=$i;$p++){
                            if($filter_r['filter_'.$d.''][$p] ?? ""){
                            echo '<div class="checkbox__list">
                                <label>
                                    <input type="checkbox" id="checkbox" name="'.$filter_r['filter_'.$d.''][$p].'">
                                    '.$filter_r['filter_'.$d.''][$p].'
                                </label>
                            </div>';
                            }
                            else ;
                        }
                        echo '</div>
                        </div>';
                    }
            }
            
?>

                <div class="filter__category">
                    <div class="filter__name">
                        <p>Цена</p>
                    </div>
                        <div class="filter__list">
                            <div class="checkbox__list">
                                <label>
                                    <input type="checkbox" id="checkbox">
                                    До 10 000 ₽ 
                                </label>
                            </div>
                            <div class="checkbox__list">
                                <label>
                                    <input type="checkbox" id="checkbox">
                                    От 10 000 до 20 000 ₽
                                </label>
                            </div>
                            <div class="checkbox__list">
                                <label>
                                    <input type="checkbox" id="checkbox">
                                    От 20 000 ₽
                                </label>
                            </div>
                        </div>
                </div>

                <!-- <div class="filter__category">
                    <div class="filter__name">
                        <p>Сокет</p>
                    </div>
                        <div class="filter__list">
                            <div class="checkbox__list">
                                <label>
                                    <input type="checkbox" id="checkbox">
                                    LGA 1151
                                </label>
                            </div>
                            <div class="checkbox__list">
                                <label>
                                    <input type="checkbox" id="checkbox">
                                    AM4
                                </label>
                            </div>
                        </div>
                </div> -->

                <div class="filters__button">
                    <button type="submit">Подтвердить</button>
                </div>
                <div class="filters__button__res">
                    <button type="reset">Сброс</button>
                </div>
</form>