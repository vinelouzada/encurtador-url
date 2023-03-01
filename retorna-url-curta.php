<?php

require "conecta-banco.php";

$urlPadrao = "localhost/";
$urlCurta = "WEfgxuC";

$statement = $pdo->prepare("SELECT * FROM url WHERE url_curta = :url_curta");
$statement->bindValue(":url_curta", $urlCurta);
$url = $statement->execute();

if (is_null($url)){
    echo "Não foi encontrado";
    return;
}

echo $urlPadrao . $urlCurta;
