<?php
	require_once("../model/conexao.php");
?>
<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="links">

		<img src="../imgs/tema/cad.png" id="lg">
		<a href="index.php"><h3>ORGANIZAÇÕES</h3></a>
		<a href="cadastro.php"><h3>CADASTRO</h3></a>
		<a href="rs.php"><h3>REDES SOCIAIS</h3></a>
		<a href="inte.php"><h3>INTEGRANTES</h3></a>
		<a href="jgs.php"><h3>JOGOS</h3></a>
		<form method="POST">
			<input type="text" name="t" placeholder="Pesquise" class="cx">
			<input type="submit" name="" value="§" class="cx">
		</form>
	</div>
	<h1 class="tema">JOGOS</h1>
	<main>
<?php


	if (!isset($_POST['t']) || $_POST['t'] == '') {
		$consulta = "select online from jogos";
	
	}else{
		$pesquisar = $_POST['t'];
		$consulta = "select online from jogos WHERE jogos.online LIKE '%$pesquisar%';";
		}
	$consulta = mysqli_query($conexao, $consulta);
?> 
<?php
	while($orgs = mysqli_fetch_assoc($consulta)){
?>
	<div class="jgs">
		<img src="../imgs/jgs/<?php echo $orgs['online']?>.png" class="jg">
	</div>
<?php 
}
?>
</main>
</body>
</html>