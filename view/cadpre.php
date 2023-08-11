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
		<img src="../imgs/esports.png" id="lg">
		<a href="index.php"><h3>ORGANIZAÇÕES</h3></a>
		<a href="cadastro.php"><h3>CADASTRO</h3></a>
		<a href="rs.php"><h3>REDES SOCIAIS</h3></a>
		<a href="inte.php"><h3>INTEGRANTES</h3></a>
		<a href="jgs.php"><h3>JOGOS</h3></a>
	</div>
<div class="cad">
	<form class="arq">
		<div class="cnt">Nome/Prêmios</div>
		<input type="text" name="nm" class="inf" required="">
		<br>
		<input type="submit" name="" class="inf">
	</form>
</div>
	<?php
	if ( !isset($_GET['nm']) || $_GET['nm'] == '') {
			?> <div class= "aviso"> <?php echo "Faça um cadastro válido"; ?> </div>
			<?php		
		}else{
			$sql = "INSERT INTO premios(Nome) VALUES('$_GET[nm]')";


			if ($conexao->query($sql) ===TRUE) {
				echo "<script>alert('Produto cadastrado!')</script>";
				header('Locantion: index.php');
			}
		} 
	?>
</body>
</html>