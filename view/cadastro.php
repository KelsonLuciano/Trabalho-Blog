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
	</div>
	<div class="cad">
		<form method="POST" enctype="multipart/form-data" autocomplete="off" class="arq">
			<div class="cnt">Nome/ORG</div>
			<input type="text" name="nm" class="inf" required>
			<div class="cnt">Logo</div>
			<input type="file" name="ft" class="inf" accept="image/*" multiple required>
			<div class="cnt">Data de criação</div>
			<input type="date" name="cri" class="inf" required>
			<br>
			<input type="submit" name="" class="inf">
		</form>
	</div>
</body>
</html>

<?php
if ( !isset($_POST['nm']) || $_POST['nm'] == '' || !isset($_POST['cri']) || $_POST['cri'] == '') {
		?> <div class= "aviso"> <?php echo "Faça um cadastro válido"; ?> </div>
			<?php			
	}else{
		$image = $_FILES['ft']['name'];
		$target = "../imgs/org/";
		$temp = explode(".", $_FILES['ft']['name']);

		$newFilename = $temp[0].round(microtime(true)). '.' .end($temp);

		if ($image == '') {
			$newFilename = 'imagem.png';
		}

		$sql = "INSERT INTO organizacao(Nome, Criação, Ft) VALUES('$_POST[nm]', '$_POST[cri]', '$newFilename')";


		if ($conexao->query($sql) ===TRUE) {
			move_uploaded_file($_FILES['ft']['tmp_name'], $target.$newFilename);
			echo "<script>alert('Organização cadastrada!')</script>";
			header('Locantion: index.php');
		}
	} 
?>