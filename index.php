<?php 
require("config/config.php");
?>
<html>
<head>
	<title><?php echo $nome_pag; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet' type='text/css'>
	<style type="text/css">	
	body {
		background-image:url("<?php echo './img/'.mt_rand(1, $total).'.jpg'; ?>");
		background-position: center;
		background-repeat: no-repeat;
		background-position: auto auto;
	}
	</style>
	

</head>
<body>
	<div class="head">Link  do Tipo Contato Home Imagens E Etc RedeSocial kk</div>
	<div class="centro">
		<div class="titulo"><center><?php echo $nome_pag; ?> </center></div>
		<form method="Get" action="search.php?type=0">
			<center><input class="busca" type="text" name="search" /><p>
				<input class="botao" type="submit" value="Buscar" /></center>
			</form>
		</div>
		
		
		<div class="rodape">
			<center>Credito : Michel G ,Tecsites<br>
				<div class="num">
					<?php 
					$select = mysql_query("SELECT * from sites");
					echo mysql_num_rows($select);?> Links Registrados!</div>
					</center>
					</div>
					</body>
					</html>
