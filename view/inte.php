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
	<h1 class="tema">INTEGRANTES</h1>
	<main>
<?php


	if (!isset($_POST['t']) || $_POST['t'] == '') {
		$consulta = "select organizacao.id_org id_org, organizacao.Nome org, group_concat(influenciadores.Nome) inte from organizacao left join influenciadores on influenciadores.id_org = organizacao.id_org group by organizacao.id_org;";
	
	}else{
		$pesquisar = $_POST['t'];
		$consulta = "select organizacao.id_org id_org, organizacao.Nome org, group_concat(influenciadores.Nome) inte from organizacao left join influenciadores on influenciadores.id_org = organizacao.id_org WHERE organizacao.Nome LIKE '%$pesquisar%' group by organizacao.id_org;";
		}
		
	$consulta = mysqli_query($conexao, $consulta);
?> 
<?php
	while($orgs = mysqli_fetch_assoc($consulta)){
		$ifl = explode(',', $orgs['inte']);

	if($orgs["inte"] == NULL) {
		exit($orgs["id_org"]);
	}
?>
	<div class="influ<?php echo($orgs['id_org']); ?>">
		<img src="../imgs/org/<?php echo $orgs['org']?>.png" class= "logoint">
			<div>
	<?php
		for ($i=0; $i < count($ifl) ; $i++) { 
	 ?>
	 	<img src="../imgs/inte/<?php echo $ifl[$i]?>.png" class= "ints">
	 <?php
	 } 
	?>
	</div>
	</div>
<?php 
}
?>
</main>
</body>
</html>