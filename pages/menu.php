<?php

$sql = "SELECT * FROM aluno WHERE nome LIKE '" . $_GET['letra'] . "%' ";
$query = mysql_query($sql) or die("SQL:". $sql . " - ERRO:" . mysql_error());
while ($linha = mysql_fetch_array($query)) {
	echo "- ". $linha['nome'] . "<br />". "<br />";
}
?>
