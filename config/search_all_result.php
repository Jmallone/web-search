<?php
set_time_limit(0);
require("config.php");
$SitesScan = 0; // seta a variavel com o valor 0
$select = mysql_query("SELECT * from sites");

while($site = mysql_fetch_array($select)){
	$site = $site['link'];//Site
	$html = file_get_contents ( $site );//ler o site
	
	$titulo1 = explode('<title>', $html);
    $titulo2 = explode('</title>',$titulo1[1]);
    $titulo = $titulo2[0];
    
    $txt1 = explode('<meta name="description" content="', $html);
    $txt2 = explode('">',$txt1[1]);
    $txt = $txt2[0];
    
	$sites = array();

	preg_match_all ( "/http:\/\/[^\"\s']+/" , $html , $matches , PREG_SET_ORDER ); //ordena os resultados

	foreach ( $matches as $val ) { // Fazer uma lista dos links encontrados

	$select = mysql_query("SELECT * from sites where link = '$val[0]'");
	$rows ='' ;
		if(mysql_num_rows($select)==0){ 
       $inserir = mysql_query("INSERT INTO sites (id, link, nome, txt)  VALUES ('','$val[0]','$titulo','$txt')") or die("erro ao tentar");
			echo "<br><font color=red>links :</font> " . $val [0] . "\r\n<br>" ; // Mostrar Links encontrados
			$SitesScan +=1; 
		} 
	}
}
if($SitesScan  == 0){
	echo "Nao foi encontrado";
	}
else{
	echo "Foi encotrado".$SitesScan ;
	}
?>
