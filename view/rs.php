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
	<section>
		<h1 class="temars">REDES SOCIAIS</h1>
		<main id="cent">
<?php

	if (!isset($_POST['t']) || $_POST['t'] == '') {
		$consulta = "select organizacao.id_org id_org,organizacao.nome org, group_concat(redes_sociais.online) rs, group_concat(rs_org.Rds) Rds from organizacao left join rs_org on organizacao.id_org = rs_org.id_org left join redes_sociais on redes_sociais.id_rs = rs_org.id_rs group by organizacao.id_org;";
	}else{
		$pesquisar = $_POST['t'];
		$consulta = "select organizacao.id_org id_org,organizacao.nome org, group_concat(redes_sociais.online) rs, group_concat(rs_org.Rds) Rds from organizacao left join rs_org on organizacao.id_org = rs_org.id_org left join redes_sociais on redes_sociais.id_rs = rs_org.id_rs group by organizacao.id_org;";
	}
	$consulta = mysqli_query($conexao, $consulta);

	while($orgs = mysqli_fetch_assoc($consulta)){
		$rs = explode(',', $orgs['rs']);
		$rds = explode(',', $orgs['Rds']);
?>	
			<div class="rs<?php echo($orgs['id_org']); ?>">
				<img src="../imgs/org/<?php echo $orgs['org']?>.png" class = "rsorg">
				<div class= linha>
				<?php
					for ($i=0; $i < count($rs) ; $i++) { 
						
	 			?>
	 				<a href="<?= $rds[$i]?>"><img src="../imgs/rs/<?php echo $rs[$i]?>.png" id = "rds"></a>
	 		<?php
				} 
			?>
				</div>
			</div>
<?php
	}
?>
		</main>
	</section>	
</body>
</html>