<form method="post">
	<input type="text" name="text" /><input type="submit" value="Scan" />
</form>
<?php
set_time_limit(0);
require("config.php");

$SitesScan = 0;
if(isset($_POST['text'])){
	$site = str_replace("http://","",$_POST['text']);	
	$sites = "http://".strip_tags($site);

$html = file_get_contents ( $sites );//ler o site

$titulo1 = explode('<title>', $html);
$titulo2 = explode('</title>',$titulo1[1]);

$titulo = $titulo2[0];

$txt1 = explode('<meta name="description" content="', $html);
$txt2 = explode('">',$txt1[1]);

$txt = $txt2[0];




$sites = array();
echo "Scan em : " . $site ;     // Mostrar o Nome do site
preg_match_all ( "/http:\/\/[^\"\s']+/" , $html , $matches , PREG_SET_ORDER ); //ordena os resultados
foreach ( $matches as $val ) { // Fazer uma lista dos links encontrados
	$select = mysql_query("SELECT * from sites where link = '$val[0]'");

	if(mysql_num_rows($select)==0){
		$inserir = mysql_query("INSERT INTO sites (id, link, nome, txt)  VALUES ('','$val[0]','$titulo','$txt')") or die("erro ao tentar");
echo "<br><font color=red>links :</font> " . $val [0] . "\r\n<br>" ; // Mostrar Links encontrados
$SitesScan +=1; 
}
}
if($SitesScan  == 0)
{
	echo "<br>Não foi encontrado";
}else
{
	echo "<br>Foi encotrado".$SitesScan ;}
}
?>
