<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
<?php        include 'php/header.php';    ?> 
<div class="container">
    <h2 class="name__subcat">Процессоры</h2>
    <div class="main__subcat">
        <div class="filters">
        <div class="filter__category">
                <div class="filter__name">
                    <p>Производитель</p>
                </div>
                    <div class="filter__list">
                        <div class="checkbox__list">
                            <label>
                                <input type="checkbox" id="checkbox">
                                AMD
                            </label>
                        </div>
                        <div class="checkbox__list">
                            <label>
                                <input type="checkbox" id="checkbox">
                                Intel
                            </label>
                        </div>
                    </div>
            </div> 
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
            <div class="filter__category">
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
            </div>
                <div class="filters__button">
                    <button type="button">Подтвердить</button>
                </div>
                <div class="filters__button__res">
                    <button type="button">Сброс</button>
                </div>
        </div>



            <div class="catalog__products">
                ASS
            </div>
    </div>
</div>

<?php        include 'php/footer.php';    ?>

</body>
</html>