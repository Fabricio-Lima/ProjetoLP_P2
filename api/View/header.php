<!DOCTYPE html>
<?php
$_SESSION['acesso'] = '1';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="View/css-site/header.css">
<header class="topo">
	<nav class="nav-header" id="navv">
		<div class="menu-icon">
			<span class="fas fa-bars"></span></div>
		<div class="logo">
			Taverna Shop
		</div>
		<div class="nav-items" id="topo">
	<ul>
			<li><a href="index.html">Início</a></li>
			<li><a href="cadastro.html">Cadastre-se aqui</a></li>
			<li style="margin-left:300px;"><?php echo "Olá, ". $_SESSION['nomeUsuario'] ?></li>
			<li><?php
				if($_SESSION['acesso'] === '1'){
					echo "<a href='index.html'><i class='fas fa-user-tie'></i></a>";
				}
				?></li>
				</ul>
				

		</div>
		<div class="search-icon">
		<span class="fas fa-search"></span></div>
		<div class="cancel-icon">
		<span class="fas fa-times"></span></div>
				<a href="View/EntrarConta.php"><svg id="icone-user" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
					<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
					<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
					</svg>
				</a>
				<a href="View/Carrinho.php"><svg id="icone-car"width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
					</svg>
				</a>
			</ul>
		</nav>
</header>
<script type="text/javascript" src="View/js-site/header.js"></script>	
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
