<?php
require("conect.php");          //
$select = mysql_query("SELECT * from sites");
$rows = mysql_num_rows($select);
echo $rows;
?>
