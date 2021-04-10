<header class="header">
<div class="container">
	<?php
	$requestUri = $_SERVER["REQUEST_URI"];
	$requestMethod = $_SERVER["REQUEST_METHOD"];
	$path = explode("/", $requestUri);
	$CatURL = $path[1];
	session_start();
		if (isset($_SESSION['admin'])) {
			echo "
			<div class='header__admin__panel'>";
					if($requestUri=='/') 	echo"
					<div class='admin__panel__func'>
					<a href='Categories'>Управление категориями</a>
					</div>";
					else {};
					echo "<div class='admin__panel__right'> 
						<div class='admin__panel__text'>
							Вы авторизовались как администратор	
						</div>
						<div class='admin__panel__exit'>
							<a href='http://localhost/php/logout.php'>[Выход]</a>
						</div>
					</div>		
			</div>";
		}
	?>
</div>
<div class="header__color">
		<div class="container">
			<div class="header__inner">
				<div class="header__logo">
				<a href="/"><img src="http://localhost/img/nix_logo_2017.png" alt="IMG"></a>
				</div>
				<div class="header__text">
					<div class="header__number" href="">✆ 8 950 554 3232</div>
				</div>
			</div>
	</div>
</div>
</header>