<?php

require "conecta-banco.php";

//$urlPadrao = $_SERVER['HTTP_HOST'];
$urlPadrao = "http://localhost:8080/";
$urlCurta = explode("/",$_SERVER['REQUEST_URI']);


/** @var  $pdo */
$statement = $pdo->prepare("SELECT * FROM url WHERE url_curta = :url_curta");
$statement->bindValue(":url_curta", $urlCurta[1]);

if (is_null($statement->execute())){
    echo "Não foi encontrado";
    return;
}

$hash = $statement->fetch();

header("Location: {$hash['url_original']}");
