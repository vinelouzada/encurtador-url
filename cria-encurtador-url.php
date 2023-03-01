<?php

require "conecta-banco.php";

$urlPadrao = "http://localhost:8080/";

$urlOriginal = $argv[1];
$alfabetoNumerico = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

$stringEmbaralhada = str_shuffle("$alfabetoNumerico");
$stringEmbaralhadaCurta = substr($stringEmbaralhada,0,7);


$statement = $pdo->prepare("INSERT INTO url (url_original, url_curta) VALUES (:url_original,:url_curta)");
$statement->bindValue(":url_original",$urlOriginal);
$statement->bindValue(":url_curta", $stringEmbaralhadaCurta);


if (!$statement->execute()){
    echo "Erro inesperado";
    return;
}

$idUltimaInsercao = $pdo->lastInsertId();

$statement2 = $pdo->query("SELECT url_curta FROM url WHERE url_id = $idUltimaInsercao");
$urlHash = $statement2->fetch();

echo "Parabéns!! Sua URL curta gerada: ". $urlPadrao . $urlHash['url_curta'];



