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
	<h1 class="tema">ORGANIZAÇÕES</h1>
	<main>
<?php	

	if (!isset($_POST['t']) || $_POST['t'] == '') {
		$consulta = "select organizacao.id_org id_org, organizacao.Ft, organizacao.nome org, group_concat(titulos.nome) tit from organizacao left join org_tit on organizacao.id_org = org_tit.id_org left join titulos on titulos.id_tit = org_tit.id_tit group by organizacao.id_org;";

		$consulta2 = "select group_concat(premios.nome) pre from organizacao left join org_pre on org_pre.id_org = organizacao.id_org left join premios on premios.id_pre = org_pre.id_pre group by  organizacao.id_org;";
	
	}else{
		$pesquisar = $_POST['t'];
		$consulta = "select organizacao.id_org id_org, organizacao.Ft, organizacao.nome org, group_concat(titulos.nome) tit from organizacao left join org_tit on organizacao.id_org = org_tit.id_org left join titulos on titulos.id_tit = org_tit.id_tit WHERE organizacao.Nome LIKE '%$pesquisar%' group by organizacao.id_org;";

		$consulta2 = "select group_concat(premios.nome) pre from organizacao left join org_pre on org_pre.id_org = organizacao.id_org left join premios on premios.id_pre = org_pre.id_pre WHERE organizacao.Nome LIKE '%$pesquisar%' group by  organizacao.id_org;";
		}
		
	$consulta = mysqli_query($conexao, $consulta);
	$consulta2 = mysqli_query($conexao, $consulta2);

?> 
	<div id="txt">
<?php
	

if ($consulta->num_rows === 0) 
		echo '<h1>Não existe</h1>';
?>
	</div>
<?php
	while(($orgs = mysqli_fetch_assoc($consulta)) && ($orgs2 = mysqli_fetch_assoc($consulta2))){
	$orgs['pre'] = $orgs2['pre'];

?>
<div class="<?php echo ($orgs['id_org'] > 4 ? 'orgpad' : 'org'.$orgs['id_org']); ?>">
	<?php echo '<h2>'.$orgs['org'].'</h2>'?>
	<img src="../imgs/org/<?php echo $orgs['Ft']?>" class="ftinha">
	<?php echo '<h4>'.$orgs['pre'].'</h4>'?>
	<a href="orgpre.php?id=<?php echo $orgs['id_org'] ?>" class = "cadinf">Cadastrar prêmio</a>
	<?php echo '<h4>'.$orgs['tit'].'</h4>'?>
	<a href="orgtit.php?id=<?php echo $orgs['id_org'] ?>" class = "cadinf">Cadastrar título</a>
</div>
<?php

}
?>
</main>
</body>
</html>

