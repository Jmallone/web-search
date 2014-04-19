<?php 
require("config/config.php");
?>
<html>
<head>
	<title><?php echo $nome_pag." : ".$_GET['search']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/search.css"/>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet' type='text/css'>
</head>
<body>

	<form method="Get" action="search.php?type=0">
		<div class="titulo_lado "><a href="index.php"><center><?php echo $nome_pag; ?></a></center></div>
		<?php 
		require("config/config.php");
		$verificar = "";
		if(isset($_GET['search'])){
			$verificar = $_GET['search'];

			if(isset($_GET['type'])){
				$search = $_GET['type'] ;
			}else{
				$search = 0;
			}

		}
		?>
		<input type="text" name="search" value ="<?php  echo urlencode($verificar); ?>"/><input type="submit" value="Buscar" />
	</form>

	<?php
		if(isset($_GET['search'])){
		$text = strip_tags($_GET['search']);
	?>
		<a href="?type=0&search=<?php  echo urlencode($text); ?>">WEB</a>  <a href="?type=1&search=<?php  echo urlencode($text); ?>">Imagens</a><BR>
		
		<?php
		@$select = mysql_query("SELECT * from sites WHERE link LIKE  '%$text%'");
		$rows = mysql_num_rows($select);
		echo "Encontrado:".$rows.'<br>';
		echo "<div class='link_img'>";
		while($scan = mysql_fetch_array($select)){

			if($search== 1){
				if(strstr($scan['link'],'.jpg') ||strstr($scan['link'],'.gif') || strstr($scan['link'],'.png') ||strstr($scan['link'],'.jpeg)')){
					echo '<a href="'.$scan['link'].'" ><span style="padding-left:20px"><img src="'.$scan['link'].'" width="150"></span></a>';
				}
	
			}else if($search== 0){
				if(!strstr($scan['link'],'jpg') && !strstr($scan['link'],'.gif') && !strstr($scan['link'],'.png') && !strstr($scan['link'],'.js') && !strstr($scan['link'],'.css')){
					echo '</div><div class="link"><a href="'.$scan['link'].'">Titulo: '.$scan['nome'].'</a> <br>Link '.$scan['link'].'<p>'.$scan['txt'].'</div>';
					}
				}
			}
		}
		?>
		

	
</body>
</html>
