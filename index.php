<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página principal</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="src/css/index.css"/>
</head>
<body>
	<div class="textoLogin">
		<h2>Bem-vindo(a), <?php echo $_SESSION['usuario'];?></h2>
		<p>Página restrita protegida por login</p>
		<p><b>Sucesso no login!</b></p>
		<p id="btLogout"><a href="logout.php">Sair</a></p>
	</div>
	<div class="exemploPagina">
		<p>EXEMPLO DE PÁGINA</p>
		<h3>Isto é somente um exemplo, não há folha de estilos nem conteúdo, exemplifica uma página inicial após o login</h3>
	</div>
</body>
</html>