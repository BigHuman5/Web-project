<header class="header">
<div class="container">
	<?php
	session_start();
		if (isset($_SESSION['login'])) {
			echo "<div class='header__admin__panel'> 
				<div class='admin__panel__text'>
					Вы авторизовались как администратор	
				</div>
				<div class='admin__panel__exit'>
					<a href='http://localhost/php/logout.php'>[Выход]</a>
				</div>		
			</div>";
		}
	?>
</div>
<div class="header__color">
		<div class="container">
			<div class="header__inner">
				<div class="header__logo">
				<a href="/"><img src="img/nix_logo_2017.png" alt="IMG"></a>
				</div>
				<div class="header__text">
					<div class="header__number" href="">✆ 8 950 554 3232</div>
				</div>
			</div>
	</div>
</div>
</header>